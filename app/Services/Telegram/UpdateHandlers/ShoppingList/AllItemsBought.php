<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class AllItemsBought extends MatchHandler
{
    protected string $pattern = '/^куплено все$/iu';

    protected function matched(array $matches = []): string
    {
        ShoppingListItem::query()
            ->update([
                'bought' => true
            ]);

        return "Весь список покупок помечен как купленный!";
    }
}
