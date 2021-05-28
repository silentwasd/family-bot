<?php

namespace App\Console\Commands;

use App\Models\Lang\Adjective;
use Illuminate\Console\Command;

class AddAdjective extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:add-adjective';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавить прилагательное.';

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
        $adj = new Adjective();

        $adj->singular_masculine_nominative = $this->ask('Именительный в ед. числе муж. рода');
        $adj->singular_masculine_genitive = $this->ask('Родительный в ед. числе муж. рода');
        $adj->singular_masculine_dative = $this->ask('Дательный в ед. числе муж. рода');
        $adj->singular_masculine_accusative = $this->ask('Винительный в ед. числе муж. рода');
        $adj->singular_masculine_accusative_animated = $this->ask('Винительный в ед. числе муж. рода одушевленный');
        $adj->singular_masculine_instrumental = $this->ask('Творительный в ед. числе муж. рода');
        $adj->singular_masculine_prepositional = $this->ask('Предложный в ед. числе муж. рода');

        $adj->save();

        $adj->singular_feminine_nominative = $this->ask('Именительный в ед. числе жен. рода');
        $adj->singular_feminine_genitive = $this->ask('Родительный в ед. числе жен. рода');
        $adj->singular_feminine_dative = $this->ask('Дательный в ед. числе жен. рода');
        $adj->singular_feminine_accusative = $this->ask('Винительный в ед. числе жен. рода');
        $adj->singular_feminine_instrumental = $this->ask('Творительный в ед. числе жен. рода');
        $adj->singular_feminine_prepositional = $this->ask('Предложный в ед. числе жен. рода');

        $adj->save();

        $adj->singular_neuter_nominative = $this->ask('Именительный в ед. числе ср. рода');
        $adj->singular_neuter_genitive = $this->ask('Родительный в ед. числе ср. рода');
        $adj->singular_neuter_dative = $this->ask('Дательный в ед. числе ср. рода');
        $adj->singular_neuter_accusative = $this->ask('Винительный в ед. числе ср. рода');
        $adj->singular_neuter_instrumental = $this->ask('Творительный в ед. числе ср. рода');
        $adj->singular_neuter_prepositional = $this->ask('Предложный в ед. числе ср. рода');

        $adj->save();

        $adj->plural_nominative = $this->ask('Именительный в мн. числе');
        $adj->plural_genitive = $this->ask('Родительный в мн. числе');
        $adj->plural_dative = $this->ask('Дательный в мн. числе');
        $adj->plural_accusative = $this->ask('Винительный в мн. числе');
        $adj->plural_accusative_animated = $this->ask('Винительный в мн. числе одушевленный');
        $adj->plural_instrumental = $this->ask('Творительный в мн. числе');
        $adj->plural_prepositional = $this->ask('Предложный в мн. числе');

        $adj->save();

        return 0;
    }
}
