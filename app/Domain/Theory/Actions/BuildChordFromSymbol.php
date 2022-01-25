<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Data\ChordData;
use App\Domain\Theory\Models\Chord;

class BuildChordFromSymbol
{
    public function __construct(
        private ParseChordSymbol $parseChordSymbol,
    ) {}

    public function execute(string $symbol): ChordData
    {
        $symbol = $this->parseChordSymbol->execute($symbol);
        $chord = Chord::symbol($symbol->chord)->first();

        return new ChordData(
            name: $chord->name,
            symbol: $symbol->chord,
            intervals: $this->getIntervals($chord, $symbol),
            notes: $this->getNotes($chord, $symbol),
        );
    }

    public function getIntervals(Chord $chord, ChordSymbolData $symbol): array
    {
        
    }
}
