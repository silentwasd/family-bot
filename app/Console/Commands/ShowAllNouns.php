<?php

namespace App\Console\Commands;

use App\Models\Lang\Noun;
use Illuminate\Console\Command;

class ShowAllNouns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:show-all-nouns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать все существительные.';

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
        $nouns = Noun::query()->orderBy('singular_nominative')->get();

        $this->table([
            'Ед. число',
            'Мн. число',
            'Род',
            'Одуш?'
        ], $nouns->map(function ($noun) {
            return [$noun->singular_nominative, $noun->plural_nominative, $noun->genus, $noun->animated ? 'да' : 'нет'];
        }));

        return 0;
    }
}
