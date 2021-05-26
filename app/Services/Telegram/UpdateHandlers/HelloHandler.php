<?php


namespace App\Services\Telegram\UpdateHandlers;


use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class HelloHandler extends MatchHandler
{
    protected string $pattern = '/привет/iu';

    protected function matched(array $matches = []): string
    {
        return 'Привет, привет! :3';
    }
}
