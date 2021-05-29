<?php


namespace App\Services\Telegram\UpdateHandlers\Ucams;


use App\Services\Ucams;
use WeStacks\TeleBot\Objects\InputFile;

class GetPreviewForNow extends \App\Services\Telegram\UpdateHandlers\MatchHandler
{
    protected string $pattern = '/^покажи улицу$/iu';

    protected function matched(array $matches = []): string
    {
        $this->bot->sendMessage([
            'chat_id' => $this->update->message->chat->id,
            'text' => 'Подождите...'
        ]);

        /** @var Ucams $ucams */
        $ucams = resolve(Ucams::class);

        $preview = $ucams->preview();
        $ucams->putVideo('ucams.mp4', $preview);
        $ucams->extractImage('ucams.mp4', 'ucams.jpg');

        return base_path('ucams.jpg');
    }

    protected function send($content)
    {
        $this->bot->sendPhoto([
            'chat_id' => $this->update->message->chat->id,
            'photo' => new InputFile(base_path('ucams.jpg'))
        ]);
    }
}
