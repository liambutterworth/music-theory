<?php

namespace App\Domain\Theory\Collections;

use App\Domain\Theory\Models\Interval;
// use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;

class NoteCollection extends Collection
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

    // const SIGNATURES = [
    //     'C'  => '',
    //     'G'  => '#',
    //     'D'  => '##',
    //     'A'  => '###',
    //     'E'  => '####',
    //     'B'  => '#####',
    //     'F#' => '######',
    //     'C#' => '#######',
    //     'Cb' => 'bbbbbbb',
    //     'Gb' => 'bbbbbb',
    //     'Db' => 'bbbbb',
    //     'Ab' => 'bbbb',
    //     'Eb' => 'bbb',
    //     'Bb' => 'bb',
    //     'F'  => 'b',
    // ];

    public static function list(): self
    {
        return new static(static::LIST);
    }

    // public static function key(string $root): self
    // {
    //     $signature = Arr::get(static::SIGNATURES, $root);
    //     dd($signature);
    //     return static::list();
    // }

    public static function getRealNote(string $note): string
    {
    }

    public static function fromIntervals(string $root, IntervalCollection $intervals): self
    {
        $notes = static::list()->invert($root);

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
            return is_array($note) ? in_array($inversion, $note) : $inversion === $note;
        })->merge($this->takeUntil(function($note) use($inversion ) {
            return is_array($note) ? in_array($inversion, $note) : $inversion === $note;
        }));
    }
}
