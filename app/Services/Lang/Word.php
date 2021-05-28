<?php


namespace App\Services\Lang;


use App\Services\Lang\Types\Adjective;
use App\Services\Lang\Types\Noun;
use App\Services\Lang\Types\Verb;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

class Word
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function noun(): Noun
    {
        if ($this->model instanceof \App\Models\Lang\Noun)
            return new Noun($this->model);
        throw new InvalidArgumentException();
    }

    public function adjective(): Adjective
    {
        if ($this->model instanceof \App\Models\Lang\Adjective)
            return new Adjective($this->model);
        throw new InvalidArgumentException();
    }

    public function verb(): Verb
    {
        if ($this->model instanceof \App\Models\Lang\Verb)
            return new Verb($this->model);
        throw new InvalidArgumentException();
    }
}
