<?php


namespace App\Services\Telegram\UpdateHandlers\Fun;


use App\Models\Lang\Adjective;
use App\Models\Lang\Noun;
use App\Models\Lang\Verb;
use App\Services\Lang\Word;
use App\Services\Telegram\UpdateHandlers\MatchHandler;
use function Symfony\Component\String\s;

class MakeSentence extends MatchHandler
{
    protected string $pattern = '/^бот, придумай предложение$/iu';

    protected function matched(array $matches = []): string
    {
        $nounA = (new Word( Noun::query()->inRandomOrder()->first() ))->noun();
        $adjA = (new Word( Adjective::query()->inRandomOrder()->first() ))->adjective();
        $verb = (new Word( Verb::query()->inRandomOrder()->first() ))->verb();
        $nounB = (new Word( Noun::query()->inRandomOrder()->first() ))->noun();
        $adjB = (new Word( Adjective::query()->inRandomOrder()->first() ))->adjective();

        $nounStrA = $nounA->randomNumber()->nominative();
        $adjStrA = $adjA->fromNoun($nounA);
        $verbStr = $verb->past()->personFromNoun($nounA);

        $nounStrB = $nounB->accusative()->randomNumber();
        $adjStrB = $adjB->fromNoun($nounB);

        return $adjStrA . ' ' . $nounStrA . ' ' . $verbStr . ' ' . $adjStrB . ' ' . $nounStrB;
    }
}
