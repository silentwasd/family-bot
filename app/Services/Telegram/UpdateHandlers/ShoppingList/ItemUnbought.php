<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class ItemUnbought extends MatchHandler
{
    protected string $pattern = '/^((?:(?!ничего).)+) не (куплено|куплен|куплена|куплены)$/iu';

    protected function matched(array $matches = []): string
    {
        $what = mb_strtolower($matches[1]);

        $item = ShoppingListItem::query()
            ->where('name', $what)
            ->first();

        if (!$item)
            return "В списке покупок элемент \"$what\" отсутствует.".
                " Может вы ошиблись? Спросите: \"что надо купить?\", чтобы увидить актуальный список покупок.";

        if (!$item->bought)
            return "Вы еще не купили \"$what\" :3";

        $item->bought = false;
        $item->save();

        return "Элемент \"$what\" перестал быть купленным!";
    }
}
