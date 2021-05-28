<?php

namespace App\Console\Commands;

use App\Models\Lang\Adjective;
use Illuminate\Console\Command;

class ShowAllAdjectives extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:show-all-adjectives';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать все прилагательные.';

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
        $adjectives = Adjective::query()->orderBy('singular_masculine_nominative')->get();

        $this->table([
            'Ед. число; муж. род',
            'Ед. число; жен. род',
            'Ед. число; ср. род',
            'Мн. число',
        ], $adjectives->map(function ($adjective) {
            return [
                $adjective->singular_masculine_nominative,
                $adjective->singular_feminine_nominative,
                $adjective->singular_neuter_nominative,
                $adjective->plural_nominative
            ];
        }));

        return 0;
    }
}
