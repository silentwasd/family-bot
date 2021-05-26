<?php


namespace App\Services\Telegram\UpdateHandlers\Fun;


use App\Services\Lang\Word;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class SentenceGenerator extends MatchHandler
{
    protected string $pattern = '/^бот, придумай предложение$/iu';

    protected function matched(array $matches = []): string
    {
        $adjectives = yaml_parse_file(resource_path('dicts/adjectives.yml'));
        $nouns = yaml_parse_file(resource_path('dicts/nouns.yml'));
        $verbs = yaml_parse_file(resource_path('dicts/verbs.yml'));

        $adjective = $adjectives[rand(0, count($adjectives))];
        $noun = $nouns[rand(0, count($nouns) - 1)];
        $verb = $verbs[rand(0, count($verbs) - 1)];
        $adjective2 = $adjectives[rand(0, count($adjectives) - 1)];
        $noun2 = $nouns[rand(0, count($nouns) - 1)];

        $adjective = (new Word($adjective))->adjective();
        $noun = (new Word($noun))->noun();

        return sprintf("%s %s %s %s %s", $adjective, $noun, $verb, $adjective2, $noun2);
    }
}
