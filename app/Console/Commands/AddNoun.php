<?php

namespace App\Console\Commands;

use App\Models\Lang\Noun;
use Illuminate\Console\Command;

class AddNoun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:add-noun';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавить существительное.';

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
        $noun = new Noun();

        $noun->singular_nominative = $this->ask('Именительный в ед. числе');
        $noun->singular_genitive = $this->ask('Родительный в ед. числе');
        $noun->singular_dative = $this->ask('Дательный в ед. числе');
        $noun->singular_accusative = $this->ask('Винительный в ед. числе');
        $noun->singular_instrumental = $this->ask('Творительный в ед. числе');
        $noun->singular_prepositional = $this->ask('Предложный в ед. числе');

        $noun->plural_nominative = $this->ask('Именительный в мн. числе');
        $noun->plural_genitive = $this->ask('Родительный в мн. числе');
        $noun->plural_dative = $this->ask('Дательный в мн. числе');
        $noun->plural_accusative = $this->ask('Винительный в мн. числе');
        $noun->plural_instrumental = $this->ask('Творительный в мн. числе');
        $noun->plural_prepositional = $this->ask('Предложный в мн. числе');

        $noun->genus = $this->askWithCompletion('Род', ['муж', 'жен', 'ср'], 'муж');

        $noun->save();

        return 0;
    }
}
