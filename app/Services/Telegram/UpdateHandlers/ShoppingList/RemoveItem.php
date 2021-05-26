<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class RemoveItem extends MatchHandler
{
    protected string $pattern = '/^не надо покупать (.+)$/iu';

    protected function matched(array $matches = []): string
    {
        $what = mb_strtolower($matches[1]);

        $item = ShoppingListItem::query()
            ->where('name', $what)
            ->first();

        if (!$item)
            return "Вам и не нужно было покупать \"$what\" :3";

        $item->delete();

        return "Из списка покупок был удален элемент \"$what\"!";
    }
}
