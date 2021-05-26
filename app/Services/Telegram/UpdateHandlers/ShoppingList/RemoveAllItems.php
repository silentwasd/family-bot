<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class RemoveAllItems extends MatchHandler
{
    protected string $pattern = '/^не надо ничего покупать$/iu';

    protected function matched(array $matches = []): string
    {
        ShoppingListItem::query()->truncate();
        return 'Все элементы из списка покупок удалены!';
    }
}
