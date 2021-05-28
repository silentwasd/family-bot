<?php

namespace App\Console\Commands;

use App\Models\Lang\Verb;
use Illuminate\Console\Command;

class AddVerb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:add-verb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавить глагол.';

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
        $verb = new Verb();

        $verb->past_me = $this->ask('Прошедшее - Я');
        $verb->past_you = $this->ask('Прошедшее - Ты');
        $verb->past_he = $this->ask('Прошедшее - Он');
        $verb->past_she = $this->ask('Прошедшее - Она');
        $verb->past_it = $this->ask('Прошедшее - Оно');
        $verb->past_they = $this->ask('Прошедшее - Они');
        $verb->past_we = $this->ask('Прошедшее - Мы');
        $verb->past_you_many = $this->ask('Прошедшее - Вы');

        $verb->save();

        $verb->present_me = $this->ask('Настоящее - Я');
        $verb->present_you = $this->ask('Настоящее - Ты');
        $verb->present_he = $this->ask('Настоящее - Он');
        $verb->present_she = $this->ask('Настоящее - Она');
        $verb->present_it = $this->ask('Настоящее - Оно');
        $verb->present_they = $this->ask('Настоящее - Они');
        $verb->present_we = $this->ask('Настоящее - Мы');
        $verb->present_you_many = $this->ask('Настоящее - Вы');

        $verb->save();

        $verb->future_me = $this->ask('Будущее - Я');
        $verb->future_you = $this->ask('Будущее - Ты');
        $verb->future_he = $this->ask('Будущее - Он');
        $verb->future_she = $this->ask('Будущее - Она');
        $verb->future_it = $this->ask('Будущее - Оно');
        $verb->future_they = $this->ask('Будущее - Они');
        $verb->future_we = $this->ask('Будущее - Мы');
        $verb->future_you_many = $this->ask('Будущее - Вы');

        $verb->save();

        return 0;
    }
}
