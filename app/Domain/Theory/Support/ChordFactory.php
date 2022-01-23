<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Data\ChordData;
use App\Domain\Theory\Data\ChordSymbolData;
use App\Domain\Theory\Models\Chord;

class ChordFactory
{
    protected Chord $chord;
    protected ChordSymbolData $symbol;
    protected IntervalCollection $intervals;
    protected NoteCollection $notes;

    public function __construct(string $symbol)
    {
        $this->symbol = ChordSymbolParser::parse($symbol);
        $this->chord = Chord::fromSymbol($this->symbol->chord);
        $this->intervals = $this->chord->intervals->applySymbol($this->symbol);
        $this->notes = NoteFactory::fromIntervals($this->symbol, $this->intervals);
    }

    public static function make(...$args): self
    {
        return new static(...$args);
    }

    public function get(): ChordData
    {
        return new ChordData(
            symbol: $this->symbol->full,
            name: $this->chord->name,
            root: $this->symbol->root,
            inversion: $this->symbol->inversion,
            intervals: $this->intervals->toArray(),
            notes: $this->notes->toArray(),
        );
    }
}
