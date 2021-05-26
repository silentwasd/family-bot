<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class ShowBuyList extends MatchHandler
{
    protected string $pattern = '/^что надо купить\?$/iu';

    protected function matched(array $matches = []): string
    {
        $items = ShoppingListItem::query()
            ->where('bought', false)
            ->orderBy('created_at')
            ->get();

        $list = $items->map(fn ($item) => '- ' . $item->name)->all();
        if ($list)
            return 'Список покупок:'.PHP_EOL.implode(PHP_EOL, $list);
        else
            return 'Ничего ^^';
    }
}
