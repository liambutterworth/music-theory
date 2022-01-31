<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Note;
use App\Domain\Theory\Support\NoteNameParser;
use App\Support\Action;

class ResolveNote extends Action
{
    public function handle(string $name): Note
    {
        return Note::whereName($name)->firstOr(function () use ($name) {
            $parser = NoteNameParser::parse($name);

            return Note::create([
                'name' => $name,
                'real_name' => $parser->resolve(),
                'is_real' => $parser->isReal(),
                'is_theoretical' => $parser->isTheoretical(),
                'is_natural' => $parser->isNatural(),
                'is_accidental' => $parser->isAccidental(),
                'is_flat' => $parser->isFlat(),
                'is_sharp' => $parser->isSharp(),
                'prefers_flats' => $parser->prefersFlats(),
                'prefers_sharps' => $parser->prefersSharps(),
                'lowers_to' => $parser->lower(),
                'raises_to' => $parser->raise(),
                'decrements_to' => $parser->decrement(),
                'increments_to' => $parser->increment(),
            ]);
        });
    }
}
