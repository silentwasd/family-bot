<?php

namespace App\Models\ShoppingList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShoppingList\ShoppingListItem
 *
 * @property int $id
 * @property string $name
 * @property int $bought
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem whereBought($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingListItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShoppingListItem extends Model
{
    use HasFactory;

    protected $table = 'shopping_list';

    protected $fillable = ['bought'];
}
