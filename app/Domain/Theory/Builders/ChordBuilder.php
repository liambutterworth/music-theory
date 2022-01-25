<?php

namespace App\Domain\Theory\Builders;

use Illuminate\Database\Eloquent\Builder;

class ChordBuilder extends Builder
{
    public function symbol(string $symbol): self
    {
        return $this->whereSymbol($symbol);
    }
}
