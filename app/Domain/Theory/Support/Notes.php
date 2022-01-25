<?php

namespace App\Domain\Theory\Support;

use Illuminate\Support\Str;

class Notes
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

    public function __construct(
        protected array $notes,
    ) {}

    public static function resolve(string $note): string
    {
        return 'resolved';
    }

    public static function fromIntervals(IntervalCollection $intervals): self
    {
    }
}
