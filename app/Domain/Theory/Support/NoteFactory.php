<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Data\ChordSymbolData;

class NoteFactory
{
    public static function fromIntervals(
        ChordSymbolData $symbol,
        IntervalCollection $intervals,
    ): NoteCollection {
        //
    }
}
