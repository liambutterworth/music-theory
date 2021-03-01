<?php

namespace App\Domain\Theory\Collections;

use Illuminate\Database\Eloquent\Collection;

class IntervalCollection extends Collection
{
    public function filterByFormula(string $formula): self
    {
        $degrees = explode('-', $formula);

        return $this->filter(function($interval) use($degrees) {
            return in_array($interval->degree, $degrees);
        });
    }

    public function toFormula(): string
    {
        return $this->pluck('degree')->implode('-');
    }
}
