<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Data\ChordSymbolData;
use App\Support\Action;
use Illuminate\Support\Str;

class ParseChordSymbol extends Action
{
    public function execute(string $symbol): ChordSymbolData
    {
        $string = Str::of($symbol);
        $root = $string->match('/[A-G]/');
        $chord = $string->after($root);

        return new ChordSymbolData(
            full: $symbol,
            root: $root,
            chord: $chord,
        );
    }
}
