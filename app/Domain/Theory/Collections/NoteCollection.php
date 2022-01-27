<?php

namespace App\Domain\Theory\Collections;

use App\Domain\Theory\Models\Interval;
use App\Domain\Theory\Models\Note;
use Illuminate\Database\Eloquent\Collection;

class NoteCollection extends Collection
{
    public static function fromIntervals(string $root, IntervalCollection $intervals): self
    {
        dd($root, $intervals->pluck('abbr')->toArray());

        $notes = Note::preferFlats()->get()->invert($root);

        return $intervals->map(function($interval) use($notes) {
            return $notes->get($interval->steps);
        })->pipeInto(static::class);
    }

    public static function fromFormula(string $root, string $formula): self
    {
        return static::fromIntervals($root, Interval::fromFormula($formula)->get());
    }

    public function invert(string $inversion): self
    {
        return $this->skipUntil(function($note) use($inversion) {
            return $note->name === $inversion;
        })->merge($this->takeUntil(function($note) use($inversion ) {
            return $note->name === $inversion;
        }));
    }
}
