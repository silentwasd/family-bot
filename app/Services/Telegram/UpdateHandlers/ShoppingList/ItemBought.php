<?php


namespace App\Services\Telegram\UpdateHandlers\ShoppingList;


use App\Models\ShoppingList\ShoppingListItem;
use App\Services\Telegram\UpdateHandlers\MatchHandler;

class ItemBought extends MatchHandler
{
    protected string $pattern = '/^(.+) (куплено|куплен|куплена|куплены)$/iu';

    protected function matched(array $matches = []): ?string
    {
        $what = mb_strtolower($matches[1]);
        if (preg_match('/^(.+) не$/', $what))
            return null;

        $item = ShoppingListItem::query()
            ->where('name', $what)
            ->first();

        if (!$item)
            return "В списке покупок элемент \"$what\" отсутствует.".
                " Может вы ошиблись? Спросите: \"что надо купить?\", чтобы увидить актуальный список покупок.";

        if ($item->bought)
            return "Вы уже купили \"$what\" :3";

        $item->bought = true;
        $item->save();

        return "Элемент \"$what\" помечен как купленный!";
    }
}
