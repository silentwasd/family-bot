<?php


namespace App\Services\Lang\Types;


trait BuildAnimate
{
    public function animated(): self
    {
        $this->animated = true;
        return $this;
    }

    public function notAnimated(): self
    {
        $this->animated = false;
        return $this;
    }

    public function animatedFromNoun(Noun $noun): self
    {
        $this->animated = $noun->animated();
        return $this;
    }
}
