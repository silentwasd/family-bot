<?php


namespace App\Services\Lang\Types;


trait BuildNumber
{
    public function singular(): self
    {
        $this->number = 'singular';
        return $this;
    }

    public function plural(): self
    {
        $this->number = 'plural';
        return $this;
    }

    public function randomNumber(): self
    {
        $this->number = ['singular', 'plural'][rand(0, 1)];
        return $this;
    }

    public function numberFromNoun(Noun $noun): self
    {
        $this->number = $noun->number();
        return $this;
    }
}
