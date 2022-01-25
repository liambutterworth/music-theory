<?php

namespace App\Domain\Theory\Support;

use Illuminate\Support\Collection;

class Note
{
    const LIST = [
        'C',
        [ 'C#', 'Db' ],
        'D',
        [ 'D#', 'Eb' ],
        'E',
        'F',
        [ 'F#', 'Gb' ],
        'G',
        [ 'G#', 'Ab' ],
        'A',
        [ 'A#', 'Bb' ],
        'B',
    ];

    public static function collection(): Collection
    {
        return Collection::wrap(static::LIST);
    }

    public static function key(string $root): Collection
    {
    }
}
