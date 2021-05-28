<?php


namespace App\Services\Lang\Types;


trait BuildTime
{
    public function past(): self
    {
        $this->time = 'past';
        return $this;
    }

    public function present(): self
    {
        $this->time = 'present';
        return $this;
    }

    public function future(): self
    {
        $this->time = 'future';
        return $this;
    }
}
