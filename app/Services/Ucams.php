<?php


namespace App\Services;


use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\ArrayShape;

class Ucams
{
    public function preview(): string
    {
        $sid = $this->sessionId();
        $cam = $this->cameraData($sid);
        $token = $this->archiveToken($sid, $cam['number']);

        $response = Http::get($this->previewUrl($cam['server'], $cam['number'],
            Carbon::now()->utc()->subSeconds(15)), [
                'token' => $token
        ]);

        return $response->body();
    }

    public function putVideo(string $name, string $content)
    {
        file_put_contents(base_path($name), $content);
    }

    public function extractImage(string $in, string $out)
    {
        $in = base_path($in);
        $out = base_path($out);
        $log = storage_path('logs/ucams.log');
        exec("echo y | ffmpeg -ss 00:00:00 -i $in -vframes 1 -q:v 2 $out > $log 2>&1");
    }

    public function sessionId(): string
    {
        if (!Cache::has('ucams/sessionId')) {
            $response = Http::withOptions([
                'allow_redirects' => false
            ])->asForm()->post('https://ucams.ufanet.ru/api/internal/login/', [
                'username' => config('services.ucams.username'),
                'password' => config('services.ucams.password')
            ]);

            $cookies = collect($response->cookies()->toArray());
            $sessionIdCookie = $cookies->filter(fn ($cookie) => $cookie['Name'] == 'sessionid')->first();

            $sessionId = $sessionIdCookie['Value'];
            $sessionIdExpires = $sessionIdCookie['Expires'];

            Cache::put('ucams/sessionId', $sessionId, Carbon::createFromTimestamp($sessionIdExpires));
            return $sessionId;
        } else {
            return Cache::get('ucams/sessionId');
        }
    }

    #[ArrayShape(['number' => "string", 'server' => "string"])] public function cameraData(string $sessionId): array
    {
        if (!Cache::has('ucams/cameraNumber')) {
            $response = Http::withCookies(['sessionid' => $sessionId], 'ucams.ufanet.ru')
                ->post('https://ucams.ufanet.ru/api/v0/cameras/my/', [
                    'fields' => [
                        'number',
                        'server'
                    ],
                    'token_l_ttl' => 3600,
                    'page' => 1,
                    'page_size' => 60
                ]);

            $cameraListData = $response->json();
            $cameraNumber = $cameraListData['results'][0]['number'];
            $cameraServer = $cameraListData['results'][0]['server']['domain'];

            Cache::put('ucams/cameraNumber', $cameraNumber);
            Cache::put('ucams/cameraServer', $cameraServer);

            return [
                'number' => $cameraNumber,
                'server' => $cameraServer
            ];
        } else {
            return [
                'number' => Cache::get('ucams/cameraNumber'),
                'server' => Cache::get('ucams/cameraServer')
            ];
        }
    }

    public function archiveToken(string $sessionId, string $cameraNumber): string
    {
        if (!Cache::has('ucams/token_r')) {
            $response = Http::withCookies(['sessionid' => $sessionId], 'ucams.ufanet.ru')
                ->post('https://ucams.ufanet.ru/api/v0/cameras/this/', [
                    'fields' => [
                        'token_r'
                    ],
                    'token_l_ttl' => 3600,
                    'token_r_ttl' => 3600,
                    'numbers' => [$cameraNumber]
                ]);

            $cameraData = $response->json();
            $cameraData = $cameraData['results'][0];

            $token_r = $cameraData['token_r'];

            Cache::put('ucams/token_r', $token_r, 3600);
            return $token_r;
        } else {
            return Cache::get('ucams/token_r');
        }
    }

    public function previewUrl(string $domain, string $cameraNumber, Carbon $time): string
    {
        return 'https://' . $domain . '/' . $cameraNumber . '/' .
            $time->format('Y/m/d/H/i/s') . '-preview.mp4';
    }
}
