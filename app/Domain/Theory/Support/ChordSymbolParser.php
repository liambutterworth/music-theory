<?php

namespace App\Domain\Theory\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class ChordSymbolParser
{
    protected Stringable $symbol;
    protected int $valid;

    public function __construct(string $symbol)
    {
        $this->symbol = Str::of($symbol);
    }

    public static function parse(...$arguments): self
    {
        return new static(...$arguments);
    }

    public function isValid()
    {
        if (!isset($this->valid)) {
            $this->valid = false;
        }

        return $this->valid;
    }
}
