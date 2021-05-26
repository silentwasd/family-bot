<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class ShowBoughtList extends MatchHandler
{
    protected string $pattern = '/^что уже куплено\?$/iu';

    protected function matched(array $matches = []): string
    {
        $items = ShoppingListItem::query()
            ->where('bought', true)
            ->orderBy('created_at')
            ->get();

        $list = $items->map(fn ($item) => '- ' . $item->name)->all();
        if ($list)
            return 'Список совершенных покупок:'.PHP_EOL.implode(PHP_EOL, $list);
        else
            return 'Пока ничего :3';
    }
}
