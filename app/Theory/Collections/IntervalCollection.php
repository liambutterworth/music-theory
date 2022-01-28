<?php

namespace App\Theory\Collections;

use App\Theory\Interval;
use Illuminate\Support\Collection;

class IntervalCollection extends Collection
{
    public function __construct(array $items = [])
    {
        parent::__construct(Interval::hydrate($items));
    }

    public function toFormula(): string
    {
        return $this->pluck('degree')->implode('-');
    }

    public function invert(int $inversion): self
    {
        return $this->skip($inversion)->merge($this->take($inversion));
    }
}
