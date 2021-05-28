<?php


namespace App\Services\Lang\Types;


trait BuildPerson
{
    public function me(): self
    {
        $this->person = 'me';
        return $this;
    }

    public function you(): self
    {
        $this->person = 'you';
        return $this;
    }

    public function he(): self
    {
        $this->person = 'he';
        return $this;
    }

    public function she(): self
    {
        $this->person = 'she';
        return $this;
    }

    public function it(): self
    {
        $this->person = 'it';
        return $this;
    }

    public function they(): self
    {
        $this->person = 'they';
        return $this;
    }

    public function we(): self
    {
        $this->person = 'we';
        return $this;
    }

    public function youMany(): self
    {
        $this->person = 'you_many';
        return $this;
    }

    public function personFromNoun(Noun $noun): self
    {
        if ($noun->number() == 'singular') {
            $this->person = match ($noun->genus()) {
                'masculine' => 'he',
                'feminine' => 'she',
                'neuter' => 'it'
            };
        } else {
            $this->person = 'they';
        }

        return $this;
    }
}
