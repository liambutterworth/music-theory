<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Support\Concerns\HasAttributes;

class Chord
{
    use HasAttributes;

    public function __construct(array $attributes)
    {
        $this->setAttributes($attributes);
    }

    public static function fromSymbol(string $symbol): self
    {
        $attributes = [];

        dd($symbol);

        return new static($attributes);
    }
}
