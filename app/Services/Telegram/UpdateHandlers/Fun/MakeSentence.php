<?php


namespace App\Services\Telegram\UpdateHandlers\Fun;


use App\Models\Lang\Adjective;
use App\Models\Lang\Noun;
use App\Models\Lang\Verb;
use App\Services\Lang\Word;
use App\Services\Telegram\UpdateHandlers\MatchHandler;
use Illuminate\Support\Str;
use function Symfony\Component\String\s;

class MakeSentence extends MatchHandler
{
    protected string $pattern = '/^бот, придумай предложение$/iu';

    protected function matched(array $matches = []): string
    {
        $nouns = Noun::query()
            ->inRandomOrder()
            ->take(3)
            ->get()
            ->map(function ($item) {
                return (new Word($item))->noun();
            })
            ->all();

        $adjectives = Adjective::query()
            ->where('singular_masculine_nominative', '!=', 'который')
            ->inRandomOrder()
            ->take(3)
            ->get()
            ->map(function ($item) {
                return (new Word($item))->adjective();
            })
            ->all();

        $verbs = Verb::query()
            ->inRandomOrder()
            ->take(2)
            ->get()
            ->map(function ($item) {
                return (new Word($item))->verb();
            })
            ->all();

        $which = (new Word(Adjective::query()
            ->where('singular_masculine_nominative', 'который')
            ->first()))
            ->adjective();

        $nounA = $nouns[0]->randomNumber()->nominative();
        $adjA = $adjectives[0]->fromNoun($nounA);
        $verbA = $verbs[0]->present()->personFromNoun($nounA);

        $nounB = $nouns[1]->randomNumber()->accusative();
        $adjB = $adjectives[1]->fromNoun($nounB);
        $verbB = $verbs[1]->past()->personFromNoun($nounB);

        $nounC = $nouns[2]->randomNumber()->accusative();
        $adjC = $adjectives[2]->fromNoun($nounC);

        return sprintf('%s %s %s %s %s, %s %s %s %s.', Str::ucfirst($adjA), $nounA, $verbA, $adjB, $nounB,
            $which->nominative()->numberFromNoun($nounB)->genusFromNoun($nounB), $verbB, $adjC, $nounC);
    }
}
