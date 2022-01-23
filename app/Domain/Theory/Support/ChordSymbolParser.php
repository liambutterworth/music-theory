<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Data\ChordSymbolData;
use Illuminate\Support\Str;

class ChordSymbolParser
{
    public static function parse(string $symbol): ChordSymbolData
    {
        $string = Str::of($symbol);
        $root = $string->match('/[A-G]/');
        $chord = $string->after($root);

        return new ChordSymbolData(
            symbol: $symbol,
            root: $root,
            chord: $chord,
        );
    }
}
