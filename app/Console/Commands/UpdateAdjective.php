<?php

namespace App\Console\Commands;

use App\Models\Lang\Adjective;
use Illuminate\Console\Command;

class UpdateAdjective extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:update-adjective';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить прилагательное.';

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

        $adj->singular_masculine_nominative = $this->ask('Именительный в ед. числе муж. рода',
            $adj->singular_masculine_nominative);
        $adj->singular_masculine_genitive = $this->ask('Родительный в ед. числе муж. рода',
            $adj->singular_masculine_genitive);
        $adj->singular_masculine_dative = $this->ask('Дательный в ед. числе муж. рода',
            $adj->singular_masculine_dative);
        $adj->singular_masculine_accusative = $this->ask('Винительный в ед. числе муж. рода',
            $adj->singular_masculine_accusative);
        $adj->singular_masculine_accusative_animated = $this->ask('Винительный в ед. числе муж. рода одушевленный',
            $adj->singular_masculine_accusative_animated);
        $adj->singular_masculine_instrumental = $this->ask('Творительный в ед. числе муж. рода',
            $adj->singular_masculine_instrumental);
        $adj->singular_masculine_prepositional = $this->ask('Предложный в ед. числе муж. рода',
            $adj->singular_masculine_prepositional);

        $adj->save();

        $adj->singular_feminine_nominative = $this->ask('Именительный в ед. числе жен. рода',
            $adj->singular_feminine_nominative);
        $adj->singular_feminine_genitive = $this->ask('Родительный в ед. числе жен. рода',
            $adj->singular_feminine_genitive);
        $adj->singular_feminine_dative = $this->ask('Дательный в ед. числе жен. рода',
            $adj->singular_feminine_dative);
        $adj->singular_feminine_accusative = $this->ask('Винительный в ед. числе жен. рода',
            $adj->singular_feminine_accusative);
        $adj->singular_feminine_instrumental = $this->ask('Творительный в ед. числе жен. рода',
            $adj->singular_feminine_instrumental);
        $adj->singular_feminine_prepositional = $this->ask('Предложный в ед. числе жен. рода',
            $adj->singular_feminine_prepositional);

        $adj->save();

        $adj->singular_neuter_nominative = $this->ask('Именительный в ед. числе ср. рода',
            $adj->singular_neuter_nominative);
        $adj->singular_neuter_genitive = $this->ask('Родительный в ед. числе ср. рода',
            $adj->singular_neuter_genitive);
        $adj->singular_neuter_dative = $this->ask('Дательный в ед. числе ср. рода',
            $adj->singular_neuter_dative);
        $adj->singular_neuter_accusative = $this->ask('Винительный в ед. числе ср. рода',
            $adj->singular_neuter_accusative);
        $adj->singular_neuter_instrumental = $this->ask('Творительный в ед. числе ср. рода',
            $adj->singular_neuter_instrumental);
        $adj->singular_neuter_prepositional = $this->ask('Предложный в ед. числе ср. рода',
            $adj->singular_neuter_prepositional);

        $adj->save();

        $adj->plural_nominative = $this->ask('Именительный в мн. числе', $adj->plural_nominative);
        $adj->plural_genitive = $this->ask('Родительный в мн. числе', $adj->plural_genitive);
        $adj->plural_dative = $this->ask('Дательный в мн. числе', $adj->plural_dative);
        $adj->plural_accusative = $this->ask('Винительный в мн. числе', $adj->plural_accusative);
        $adj->plural_accusative_animated = $this->ask('Винительный в мн. числе одушевленный', $adj->plural_accusative_animated);
        $adj->plural_instrumental = $this->ask('Творительный в мн. числе', $adj->plural_instrumental);
        $adj->plural_prepositional = $this->ask('Предложный в мн. числе', $adj->plural_prepositional);

        $adj->save();

        return 0;
    }
}
