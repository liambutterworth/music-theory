<?php

namespace App\Domain\Theory\Builders;

use Illuminate\Database\Eloquent\Builder;

class IntervalBuilder extends Builder
{
    public function fromFormula(string $formula): self
    {
        return $this->whereInFormula('degree', explode('-', $formula));
    }
}
