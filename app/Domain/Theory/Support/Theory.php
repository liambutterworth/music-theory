<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;
use App\Domain\Theory\Models\Note;
use App\Domain\Theory\Models\Scale;

class Theory
{
    public static function note(string $name): Note
    {
        return Note::fromName($name);
    }

    public static function interval(string $abbr): Interval
    {
        return Interval::fromAbbr($abbr);
    }

    public static function degree(string $degree): Interval
    {
        return Interval::fromDegree($degree);
    }

    public static function chord(string $symbol): Chord
    {
        return Chord::fromSymbol($symbol);
    }

    public static function scale(string $name): Scale
    {
        return Scale::fromName($name);
    }

    public static function key(string $root): Key
    {
        return Key::fromRoot($root);
    }
}
