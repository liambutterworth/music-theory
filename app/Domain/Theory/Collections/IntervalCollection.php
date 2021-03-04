<?php

namespace App\Domain\Theory\Collections;

use Illuminate\Database\Eloquent\Collection;

class IntervalCollection extends Collection
{
    public function toFormula(): string
    {
        return $this->pluck('degree')->implode('-');
    }
}
