<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class AllItemsUnbought extends MatchHandler
{
    protected string $pattern = '/^ничего не куплено$/iu';

    protected function matched(array $matches = []): string
    {
        ShoppingListItem::query()
            ->update([
                'bought' => false
            ]);

        return "Весь список покупок перестал быть купленным!";
    }
}
