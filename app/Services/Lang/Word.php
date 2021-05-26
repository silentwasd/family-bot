<?php


namespace App\Services\Lang;


use App\Services\Lang\Word\Types;

class Word
{
    use Types;

    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
