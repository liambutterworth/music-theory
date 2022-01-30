<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Exceptions\InvalidChordException;
use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Support\ChordSymbolParser;
use App\Support\Action;

class ResolveChord extends Action
{
    public function handle(string $symbol)
    {
        return Chord::whereSymbol($symbol)->firstOr(function () use ($symbol) {
            $parser = ChordSymbolParser::parse($symbol);

            if (!$parser->isValid()) {
                throw new InvalidChordException("Chord $symbol is invalid");
            }

            return Chord::create([
                'symbol' => $symbol,
            ]);
        });
    }
}
