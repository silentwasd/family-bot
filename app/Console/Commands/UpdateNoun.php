<?php

namespace App\Console\Commands;

use App\Models\Lang\Noun;
use Illuminate\Console\Command;

class UpdateNoun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:update-noun';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить существительное.';

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

        $noun->singular_nominative = $this->ask('Именительный в ед. числе', $noun->singular_nominative);
        $noun->singular_genitive = $this->ask('Родительный в ед. числе', $noun->singular_genitive);
        $noun->singular_dative = $this->ask('Дательный в ед. числе', $noun->singular_dative);
        $noun->singular_accusative = $this->ask('Винительный в ед. числе', $noun->singular_accusative);
        $noun->singular_instrumental = $this->ask('Творительный в ед. числе', $noun->singular_instrumental);
        $noun->singular_prepositional = $this->ask('Предложный в ед. числе', $noun->singular_prepositional);

        $noun->plural_nominative = $this->ask('Именительный в мн. числе', $noun->plural_nominative);
        $noun->plural_genitive = $this->ask('Родительный в мн. числе', $noun->plural_genitive);
        $noun->plural_dative = $this->ask('Дательный в мн. числе', $noun->plural_dative);
        $noun->plural_accusative = $this->ask('Винительный в мн. числе', $noun->plural_accusative);
        $noun->plural_instrumental = $this->ask('Творительный в мн. числе', $noun->plural_instrumental);
        $noun->plural_prepositional = $this->ask('Предложный в мн. числе', $noun->plural_prepositional);

        $noun->genus = $this->askWithCompletion('Род', ['муж', 'жен', 'ср'], $noun->genus);

        $noun->save();

        return 0;
    }
}
