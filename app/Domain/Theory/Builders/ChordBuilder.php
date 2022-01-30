<?php

namespace App\Domain\Theory\Builders;

use App\Domain\Theory\Actions\ResolveChord;
use App\Domain\Theory\Models\Chord;
use Illuminate\Database\Eloquent\Builder;

class ChordBuilder extends Builder
{
    public function fromSymbol(string $symbol): Chord
    {
        return ResolveChord::execute($symbol);
    }
}
