<?php


namespace App\Services\Lang\Types;


use App\Services\Lang\Word;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

/**
 * Class Noun
 * @package App\Services\Lang\Types
 * @property \App\Models\Lang\Noun $model
 */
class Noun extends Word
{
    use BuildNumber, BuildCase;

    protected string $number;

    protected string $case;

    protected string $genus;

    #[Pure] public function __construct(\App\Models\Lang\Noun $model)
    {
        parent::__construct($model);
    }

    public function number(): string
    {
        return $this->number;
    }

    public function case(): string
    {
        return $this->case;
    }

    public function genus(): string
    {
        return match ($this->model->genus) {
            'муж' => 'masculine',
            'жен' => 'feminine',
            'ср' => 'neuter'
        };
    }

    public function animated(): bool
    {
        return (bool)$this->model->animated;
    }

    public function __toString(): string
    {
        return $this->model->{$this->number.'_'.$this->case};
    }
}
