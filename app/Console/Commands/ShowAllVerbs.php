<?php

namespace App\Console\Commands;

use App\Models\Lang\Verb;
use Illuminate\Console\Command;

class ShowAllVerbs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:show-all-verbs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать все глаголы.';

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
    public function handle()
    {
        $verbs = Verb::query()->orderBy('past_me')->get();

        $this->table([
            'Прошедшее',
            'Настоящее',
            'Будущее'
        ], $verbs->map(function ($verb) {
            return [$verb->past_me, $verb->present_me, $verb->future_me];
        }));

        return 0;
    }
}
