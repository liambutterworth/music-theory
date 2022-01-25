<?php

namespace App\Domain\Theory\Builders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class IntervalBuilder extends Builder
{
    public function fromFormula(string $formula): self
    {
        return $this->whereIn('abbr', Str::of($formula)->explode('-'));
    }
}
