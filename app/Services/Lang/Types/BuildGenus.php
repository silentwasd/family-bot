<?php


namespace App\Services\Lang\Types;


trait BuildGenus
{
    public function masculine(): self
    {
        $this->genus = 'masculine';
        return $this;
    }

    public function feminine(): self
    {
        $this->genus = 'feminine';
        return $this;
    }

    public function neuter(): self
    {
        $this->genus = 'neuter';
        return $this;
    }

    public function genusFromNoun(Noun $noun): self
    {
        $this->genus = $noun->genus();
        return $this;
    }
}
