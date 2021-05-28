<?php


namespace App\Services\Lang\Types;


trait BuildCase
{
    public function nominative(): self
    {
        $this->case = 'nominative';
        return $this;
    }

    public function genitive(): self
    {
        $this->case = 'genitive';
        return $this;
    }

    public function dative(): self
    {
        $this->case = 'dative';
        return $this;
    }

    public function accusative(): self
    {
        $this->case = 'accusative';
        return $this;
    }

    public function instrumental(): self
    {
        $this->case = 'instrumental';
        return $this;
    }

    public function prepositional(): self
    {
        $this->case = 'prepositional';
        return $this;
    }

    public function randomCase(): self
    {
        $this->case = ['nominative', 'genitive', 'dative', 'accusative', 'instrumental', 'prepositional'][rand(0, 5)];
        return $this;
    }

    public function caseFromNoun(Noun $noun): self
    {
        $this->case = $noun->case();
        return $this;
    }
}
