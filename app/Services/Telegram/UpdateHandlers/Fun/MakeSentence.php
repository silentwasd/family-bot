<?php


namespace App\Services\Telegram\UpdateHandlers\Fun;


use App\Models\Lang\Adjective;
use App\Models\Lang\Noun;
use App\Models\Lang\Verb;
use App\Services\Telegram\UpdateHandlers\MatchHandler;
use function Symfony\Component\String\s;

class MakeSentence extends MatchHandler
{
    protected string $pattern = '/^бот, придумай предложение$/iu';

    protected function matched(array $matches = []): string
    {
        $nounA = Noun::query()->inRandomOrder()->first();
        $adjA = Adjective::query()->inRandomOrder()->first();
        $verb = Verb::query()->inRandomOrder()->first();
        $nounB = Noun::query()->inRandomOrder()->first();
        $adjB = Adjective::query()->inRandomOrder()->first();

        $cases = ['nominative', 'genitive', 'dative', 'accusative', 'instrumental', 'prepositional'];
        $numbers = ['singular', 'plural'];
        $genders = ['masculine', 'feminine', 'neuter'];
        $genusT = ['муж' => 'masculine', 'жен' => 'feminine', 'ср' => 'neuter'];

        $nounStrA = $nounA->singular_nominative;
        $adjStrA = $adjA->{'singular_'.$genusT[$nounA->genus].'_nominative'};
        $verbStr = $verb->{'past_'.['муж' => 'he', 'жен' => 'she', 'ср' => 'it'][$nounA->genus]};
        $nounNumberB = $numbers[rand(0, 1)];
        $nounStrB = $nounB->{$nounNumberB.'_accusative'};
        if ($nounNumberB == 'singular' && $nounB->genus == 'муж' && $nounB->animated)
            $adjStrB = $adjB->singular_masculine_accusative_animated;
        else if ($nounNumberB == 'singular')
            $adjStrB = $adjB->{$nounNumberB.'_'.$genusT[$nounB->genus].'_accusative'};
        else if ($nounNumberB == 'plural' && $nounB->animated)
            $adjStrB = $adjB->plural_accusative_animated;
        else
            $adjStrB = $adjB->plural_accusative;

        $nounCase = $cases[rand(0, 5)];
        $nounNumber = $numbers[rand(0, 1)];
        $noun = $nounA->{$nounNumber.'_'.$nounCase};

        $adjGender = ['муж' => 'masculine', 'жен' => 'feminine', 'ср' => 'neuter'][$nounA->genus];

        if ($nounNumber == 'plural') {
            $adj = $adjA->{$nounNumber . '_' . $nounCase};
            if ($nounCase == 'accusative' && $nounA->animated)
                $adj = $adjA->{$nounNumber . '_' . $nounCase . '_animated'};
        } else {
            $adj = $adjA->{$nounNumber . '_' . $adjGender . '_' . $nounCase};
            if ($adjGender == 'masculine' && $nounCase == 'accusative' && $nounA->animated)
                $adj = $adjA->{$nounNumber . '_' . $adjGender . '_' . $nounCase . '_animated'};
        }

        return $adjStrA . ' ' . $nounStrA . ' ' . $verbStr . ' ' . $adjStrB . ' ' . $nounStrB;
    }
}
