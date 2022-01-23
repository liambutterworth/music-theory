<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Data\ChordData;
use App\Domain\Theory\Models\Chord;
use App\Support\Action;

class BuildChordFromSymbol extends Action
{
    public function __construct(
        private ParseChordSymbol $parseChordSymbol,
    ) {}

    public function execute(string $symbol): ChordData
    {
        $symbol = $this->parseChordSymbol->execute($symbol);
        $chord = Chord::fromSymbol($symbol->chord);
        $intervals = $chord->intervals->applySymbol($symbol);
        $notes = $intervals->toNotes();

        return new ChordData(
            symbol: $symbol->full,
            name: $chord->name,
            root: $symbol->root,
            inversion: $symbol->inversion,
            intervals: $intervals->toArray(),
            notes: $notes->toArray(),
        );
    }
}
