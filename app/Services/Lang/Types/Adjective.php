<?php


namespace App\Services\Lang\Types;


use App\Services\Lang\Word;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

/**
 * Class Adjective
 * @package App\Services\Lang\Types
 * @property \App\Models\Lang\Adjective $model
 */
class Adjective extends Word
{
    use BuildNumber, BuildCase, BuildGenus, BuildAnimate;

    protected string $number;

    protected string $case;

    protected string $genus;

    protected bool $animated = false;

    #[Pure] public function __construct(\App\Models\Lang\Adjective $model)
    {
        parent::__construct($model);
    }

    public function fromNoun(Noun $noun): self
    {
        return $this->numberFromNoun($noun)
                    ->caseFromNoun($noun)
                    ->genusFromNoun($noun)
                    ->animatedFromNoun($noun);
    }

    public function __toString(): string
    {
        if ($this->number == 'singular') {
            if ($this->genus == 'masculine' && $this->case == 'accusative' && $this->animated)
                return $this->model->{$this->number . '_' . $this->genus . '_' . $this->case . '_animated'};
            else
                return $this->model->{$this->number . '_' . $this->genus . '_' . $this->case};
        } else {
            if ($this->case == 'accusative' && $this->animated)
                return $this->model->{$this->number . '_' . $this->case . '_animated'};
            else
                return $this->model->{$this->number . '_' . $this->case};
        }
    }
}
