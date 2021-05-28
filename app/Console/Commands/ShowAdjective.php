<?php

namespace App\Console\Commands;

use App\Models\Lang\Adjective;
use Illuminate\Console\Command;

class ShowAdjective extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:show-adjective';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать прилагательное.';

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
        $singularNominative = $this->ask('Именительный в ед. числе муж. рода');

        $adj = Adjective::query()->where('singular_masculine_nominative', $singularNominative)->first();
        if (!$adj) {
            $this->error('Не удалось найти.');
            return 1;
        }

        $this->info('Падежи:');

        $this->table([
            'Падеж',
            'Ед. ч. / Муж. род',
            'Ед. ч. / Жен. род',
            'Ед. ч. / Ср. род',
            'Мн. ч.'
        ], [
            ['Им.', $adj->singular_masculine_nominative, $adj->singular_feminine_nominative,
                $adj->singular_neuter_nominative, $adj->plural_nominative],
            ['Р.', $adj->singular_masculine_genitive, $adj->singular_feminine_genitive,
                $adj->singular_neuter_genitive, $adj->plural_genitive],
            ['Д.', $adj->singular_masculine_dative, $adj->singular_feminine_dative,
                $adj->singular_neuter_dative, $adj->plural_dative],
            ['В.', $adj->singular_masculine_accusative.', '.$adj->singular_masculine_accusative_animated.' (одуш.)',
                $adj->singular_feminine_accusative, $adj->singular_neuter_accusative,
                $adj->plural_accusative.', '.$adj->plural_accusative_animated.' (одуш.)'],
            ['Тв.', $adj->singular_masculine_instrumental, $adj->singular_feminine_instrumental,
                $adj->singular_neuter_instrumental, $adj->plural_instrumental],
            ['Пр.', $adj->singular_masculine_prepositional, $adj->singular_feminine_prepositional,
                $adj->singular_neuter_prepositional, $adj->plural_prepositional],
        ]);

        return 0;
    }
}
