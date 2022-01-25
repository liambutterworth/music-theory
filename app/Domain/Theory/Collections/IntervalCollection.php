<?php

namespace App\Domain\Theory\Collections;

use Illuminate\Database\Eloquent\Collection;

class IntervalCollection extends Collection
{
    public function toFormula(): string
    {
        return $this->pluck('degree')->implode('-');
    }

    public function invert(int $inversion): self
    {
        return $this->skip($inversion)->merge($this->take($inversion));
    }
}
