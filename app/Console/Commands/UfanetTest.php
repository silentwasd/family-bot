<?php

namespace App\Console\Commands;

use App\Services\Ucams;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UfanetTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ufanet:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Тестирование API Уфанета.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Ucams $ucams)
    {
        $preview = $ucams->preview();
        $ucams->putVideo('ucams.mp4', $preview);
        $ucams->extractImage('ucams.mp4', 'ucams.jpg');

        return 0;
    }
}
