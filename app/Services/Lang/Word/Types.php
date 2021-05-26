<?php


namespace App\Services\Lang\Word;


trait Types
{
    protected string $type;

    public function adjective(): self
    {
        $this->type = 'adjective';
        return $this;
    }

    public function noun(): Noun
    {
        return new Noun($this->name);
    }
}
