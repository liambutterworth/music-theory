<?php

namespace App\Domain\Theory\Builders;

use Illuminate\Database\Eloquent\Builder;

class IntervalBuilder extends Builder
{
    public function whereInFormula(string $formula): self
    {
        return $this->whereIn('degree', explode('-', $formula));
    }
}
