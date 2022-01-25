<?php

namespace App\Domain\Theory\Support;

use Illuminate\Support\Str;

class Symbol
{
    public function __construct(
        protected string $chord,
        protected ?string $root = null,
        protected ?string $inversion = null,
    ) {}

    public static function parse(string $symbol)
    {
        $matches = Str::of($symbol)->matchAll('/[A-G]|[a-zA-Z0-9]+/');

        if ($matches->count() === 1) {
            return new static(
                chord: $matches->get(0),
            );
        } else if ($matches->count() === 2) {
            return new static(
                chord: $matches->get(1),
                root: $matches->get(0),
            );
        } else {
            return new static(
                chord: $matches->get(2),
                root: $matches->get(0),
                inversion: $matches->get(1),
            );
        }
    }

    public function __get(string $property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __toString(): string
    {
        return Str::of($this->root)->when($this->inversion, function($string) {
            return $string->append("/{$this->inversion}");
        })->append($this->chord);
    }
}
