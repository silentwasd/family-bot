<?php

namespace App\Models\ShoppingList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingListItem extends Model
{
    use HasFactory;

    protected $table = 'shopping_list';

    protected $fillable = ['bought'];
}
