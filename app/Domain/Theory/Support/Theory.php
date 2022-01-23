<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Actions\BuildChordFromSymbol;
use App\Domain\Theory\Data\ChordData;

class Theory
{
    public static function chord(string $symbol): ChordData
    {
        // return BuildChordFromSymbol::make()->execute($symbol);
    }

    // public static function scale(string $name): ScaleData
    // {
    //     return ScaleFactory::make($name)->get();
    // }
}
