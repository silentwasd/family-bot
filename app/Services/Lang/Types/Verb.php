<?php


namespace App\Services\Lang\Types;


use App\Services\Lang\Word;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

/**
 * Class Verb
 * @package App\Services\Lang\Types
 * @property \App\Models\Lang\Verb $model
 */
class Verb extends Word
{
    use BuildTime, BuildPerson;

    protected string $time;

    protected string $person;

    #[Pure] public function __construct(\App\Models\Lang\Verb $model)
    {
        parent::__construct($model);
    }

    public function __toString(): string
    {
        return $this->model->{$this->time.'_'.$this->person};
    }
}
