<?php

namespace App\Console\Commands;

use App\Models\Lang\Noun;
use Illuminate\Console\Command;

class ShowNoun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:show-noun';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать существительное.';

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
        $singularNominative = $this->ask('Именительный в ед. числе');

        $noun = Noun::query()->where('singular_nominative', $singularNominative)->first();
        if (!$noun) {
            $this->error('Не удалось найти.');
            return 1;
        }

        $this->info('Основные свойства:');
        $this->table([
            'Свойство',
            'Значение'
        ], [
            ['Род', $noun->genus],
            ['Одушевленный?', $noun->animated ? 'да': 'нет']
        ]);
        $this->newLine();

        $this->info('Падежи:');

        $this->table([
            'Падеж',
            'Ед. ч.',
            'Мн. ч.'
        ], [
            ['Им.', $noun->singular_nominative, $noun->plural_nominative],
            ['Р.', $noun->singular_genitive, $noun->plural_genitive],
            ['Д.', $noun->singular_dative, $noun->plural_dative],
            ['В.', $noun->singular_accusative, $noun->plural_accusative],
            ['Тв.', $noun->singular_instrumental, $noun->plural_instrumental],
            ['Пр.', $noun->singular_prepositional, $noun->plural_prepositional],
        ]);

        return 0;
    }
}
