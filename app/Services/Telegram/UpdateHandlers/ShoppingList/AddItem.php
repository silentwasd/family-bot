<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class AddItem extends MatchHandler
{
    protected string $pattern = '/^надо купить (.+)$/iu';

    protected function matched(array $matches = []): string
    {
        $what = mb_strtolower($matches[1]);
        $list = collect(explode(',', $what))->map(fn ($item) => trim($item));

        foreach ($list as $name) {
            if (!$item = ShoppingListItem::query()->where('name', $name)->first())
                $item = new ShoppingListItem();

            $item->name = $name;
            $item->bought = false;
            $item->save();
        }

        if (count($list) == 1)
            return "В список покупок был добавлен элемент \"$what\"!";
        else {
            $list = $list->map(fn ($item) => '- '.$item)->all();
            return "В список покупок были добавлены элементы:" . PHP_EOL . implode(PHP_EOL, $list);
        }
    }
}
