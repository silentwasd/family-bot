<?php

namespace App\Console\Commands;

use App\Models\Lang\Verb;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class ShowVerb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:show-verb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать глагол.';

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
        $presentMe = $this->ask('Настоящее - Я');

        $verb = Verb::query()->where('present_me', $presentMe)->first();
        if (!$verb) {
            $this->error('Не удалось найти.');
            return 1;
        }

        $this->table([
            'Кто',
            'Прошедшее',
            'Настоящее',
            'Будущее'
        ], [
            ['Я', $verb->past_me, $verb->present_me, $verb->future_me],
            ['Ты', $verb->past_you, $verb->present_you, $verb->future_you],
            ['Он', $verb->past_he, $verb->present_he, $verb->future_he],
            ['Она', $verb->past_she, $verb->present_she, $verb->future_she],
            ['Оно', $verb->past_it, $verb->present_it, $verb->future_it],
            ['Они', $verb->past_they, $verb->present_they, $verb->future_they],
            ['Мы', $verb->past_we, $verb->present_we, $verb->future_we],
            ['Вы', $verb->past_you_many, $verb->present_you_many, $verb->future_you_many],
        ]);

        return 0;
    }
}
