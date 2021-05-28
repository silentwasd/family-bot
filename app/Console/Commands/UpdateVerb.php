<?php

namespace App\Console\Commands;

use App\Models\Lang\Verb;
use Illuminate\Console\Command;

class UpdateVerb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:update-verb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить глагол.';

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

        $verb->past_me = $this->ask('Прошедшее - Я', $verb->past_me);
        $verb->past_you = $this->ask('Прошедшее - Ты', $verb->past_you);
        $verb->past_he = $this->ask('Прошедшее - Он', $verb->past_he);
        $verb->past_she = $this->ask('Прошедшее - Она', $verb->past_she);
        $verb->past_it = $this->ask('Прошедшее - Оно', $verb->past_it);
        $verb->past_they = $this->ask('Прошедшее - Они', $verb->past_they);
        $verb->past_we = $this->ask('Прошедшее - Мы', $verb->past_we);
        $verb->past_you_many = $this->ask('Прошедшее - Вы', $verb->past_you_many);

        $verb->save();

        $verb->present_me = $this->ask('Настоящее - Я', $verb->present_me);
        $verb->present_you = $this->ask('Настоящее - Ты', $verb->present_you);
        $verb->present_he = $this->ask('Настоящее - Он', $verb->present_he);
        $verb->present_she = $this->ask('Настоящее - Она', $verb->present_she);
        $verb->present_it = $this->ask('Настоящее - Оно', $verb->present_it);
        $verb->present_they = $this->ask('Настоящее - Они', $verb->present_they);
        $verb->present_we = $this->ask('Настоящее - Мы', $verb->present_we);
        $verb->present_you_many = $this->ask('Настоящее - Вы', $verb->present_you_many);

        $verb->save();

        $verb->future_me = $this->ask('Будущее - Я', $verb->future_me);
        $verb->future_you = $this->ask('Будущее - Ты', $verb->future_you);
        $verb->future_he = $this->ask('Будущее - Он', $verb->future_he);
        $verb->future_she = $this->ask('Будущее - Она', $verb->future_she);
        $verb->future_it = $this->ask('Будущее - Оно', $verb->future_it);
        $verb->future_they = $this->ask('Будущее - Они', $verb->future_they);
        $verb->future_we = $this->ask('Будущее - Мы', $verb->future_we);
        $verb->future_you_many = $this->ask('Будущее - Вы', $verb->future_you_many);

        $verb->save();

        return 0;
    }
}
