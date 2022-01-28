<?php

namespace App\Theory;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

final class Dictionary
{
    private static $definitions = [
        'notes' => [
            'all'    => ['A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#', 'Ab'],
            'flats'  => ['A', 'Bb', 'B', 'C', 'Db', 'D', 'Eb', 'E', 'F', 'Gb', 'G', 'Ab'],
            'sharps' => ['A', 'A#', 'B', 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#'],
            'ruler' => ['A', ['A#', 'Bb'], 'B', 'C', ['C#', 'Db'], 'D', ['D#', 'Eb'], 'E', 'F', ['F#', 'Gb'], 'G', ['G#', 'Ab']],
        ],

        'intervals' => [
            [ 'name' => 'perfect unison',     'abbr' => 'P1', 'degree' => '1',   'steps' => 0 ],
            [ 'name' => 'diminished second',  'abbr' => 'd2', 'degree' => 'bb2', 'steps' => 0 ],
            [ 'name' => 'minor second',       'abbr' => 'm2', 'degree' => 'b2',  'steps' => 1 ],
            [ 'name' => 'augmented unison',   'abbr' => 'A1', 'degree' => '#1',  'steps' => 1 ],
            [ 'name' => 'major second',       'abbr' => 'M2', 'degree' => '2',   'steps' => 2 ],
            [ 'name' => 'diminished third',   'abbr' => 'd3', 'degree' => 'bb3', 'steps' => 2 ],
            [ 'name' => 'minor third',        'abbr' => 'm3', 'degree' => 'b3',  'steps' => 3 ],
            [ 'name' => 'augmented second',   'abbr' => 'A2', 'degree' => '#2',  'steps' => 3 ],
            [ 'name' => 'major third',        'abbr' => 'M3', 'degree' => '3',   'steps' => 4 ],
            [ 'name' => 'diminished fourth',  'abbr' => 'd4', 'degree' => 'bb4', 'steps' => 4 ],
            [ 'name' => 'perfect fourth',     'abbr' => 'P4', 'degree' => '4',   'steps' => 5 ],
            [ 'name' => 'augmented third',    'abbr' => 'A3', 'degree' => '#3',  'steps' => 5 ],
            [ 'name' => 'diminished fifth',   'abbr' => 'd5', 'degree' => 'bb5', 'steps' => 6 ],
            [ 'name' => 'augmented fourth',   'abbr' => 'A4', 'degree' => '#4',  'steps' => 6 ],
            [ 'name' => 'perfect fifth',      'abbr' => 'P5', 'degree' => '5',   'steps' => 7 ],
            [ 'name' => 'diminished sixth',   'abbr' => 'd6', 'degree' => 'bb6', 'steps' => 7 ],
            [ 'name' => 'minor sixth',        'abbr' => 'm6', 'degree' => 'b6',  'steps' => 8 ],
            [ 'name' => 'augmented fifth',    'abbr' => 'A5', 'degree' => '#5',  'steps' => 8 ],
            [ 'name' => 'major sixth',        'abbr' => 'M6', 'degree' => '6',   'steps' => 9 ],
            [ 'name' => 'diminished seventh', 'abbr' => 'd7', 'degree' => 'bb7', 'steps' => 9 ],
            [ 'name' => 'minor seventh',      'abbr' => 'm7', 'degree' => 'b7',  'steps' => 10 ],
            [ 'name' => 'augmented sixth',    'abbr' => 'A6', 'degree' => '#6',  'steps' => 10 ],
            [ 'name' => 'major seventh',      'abbr' => 'M7', 'degree' => '7',   'steps' => 11 ],
            [ 'name' => 'diminished octave',  'abbr' => 'd8', 'degree' => 'bb8', 'steps' => 11 ],
            [ 'name' => 'perfect octave',     'abbr' => 'P8', 'degree' => '8',   'steps' => 12 ],
            [ 'name' => 'augmented seventh',  'abbr' => 'A7', 'degree' => '#7',  'steps' => 12 ]
        ],

        'chords' => [
            [ 'name' => 'major',      'formula' => '1-3-5',   'abbr' => 'maj' ],
            [ 'name' => 'minor',      'formula' => '1-b3-5',  'abbr' => 'm' ],
            [ 'name' => 'diminished', 'formula' => '1-b3-b5', 'abbr' => 'dim' ],
            [ 'name' => 'augmented',  'formula' => '1-3-#5',  'abbr' => 'aug' ],
        ],

        'synonyms' => [

            // Notes
            'Abb' => 'G',
            'Ab' => 'G#',
            'A#' => 'Bb',
            'A##' => 'C',
            'Ax' => 'C',
            'Bbb' => 'A',
            'Bb' => 'A#',
            // 'B#' => 'C',
            'B##' => 'C#',
            'Bx' => 'C#',
            'Cbb' => 'Bb',
            'Cb' => 'B',
            'C#' => 'Db',
            'C##' => 'D',
            'Cx' => 'D',
            'Dbb' => 'C',
            'Db' => 'C#',
            'D#' => 'Eb',
            'D##' => 'E',
            'Dx' => 'E',
            'Ebb' => 'D',
            'Eb' => 'D#',
            'E#' => 'F',
            'E##' => 'F#',
            'Ex' => 'F#',
            'Fbb' => 'Eb',
            'Fb' => 'E',
            'F#' => 'Gb',
            'F##' => 'G',
            'Gbb' => 'F',
            'Gb' => 'F#',
            'G#' => 'Ab',
            'G##' => 'A',
            'Gx' => 'A',

            // Chords
            'M' => 'maj',
            'm' => 'min',
            '-' => 'min',
            '°' => 'dim',
            '+' => 'aug',
        ],
    ];

    public static function define(string $term, mixed $definition): mixed
    {
        Arr::set(static::$definitions, $term, $definition);

        return $definition;
    }

    public static function defines(string $term): bool
    {
        return Arr::has(static::$definitions, $term);
    }

    public static function contains(string $context, string $term): bool
    {
        return Arr::has(Arr::get(static::$definitions, $context, []), $term);
    }

    public static function lookup(string $term, mixed $default = null): mixed
    {
        return Arr::get(static::$definitions, $term, $default);
    }

    public static function collect(string $key): Collection
    {
        return new Collection(static::lookup($key, []));
    }

    public static function resolve(string $term, ?callable $define = null): mixed
    {
        return static::defines($term) ? static::lookup($term) : static::define($term, $define());
    }
}
