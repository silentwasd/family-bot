<?php


namespace App\Services\Telegram\UpdateHandlers;


use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class MatchHandler extends UpdateHandler
{
    protected string $pattern = '/sample/';

    public static function trigger(Update $update, TeleBot $bot): bool
    {
        return isset($update->message);
    }

    public function handle()
    {
        $text = $this->update->message->text ?? '';

        if (!preg_match($this->pattern, $text, $matches))
            return;

        $out = $this->matched($matches);
        if ($out !== null) {
            $this->send($out);
        }
    }

    protected function matched(array $matches = [])
    {
        return null;
    }

    protected function send($content)
    {
        $this->bot->sendMessage([
            'chat_id' => $this->update->message->chat->id,
            'text' => $content
        ]);
    }
}
