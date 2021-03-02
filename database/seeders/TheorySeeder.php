<?php

namespace Database\Seeders;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;
use App\Domain\Theory\Models\Note;
use App\Domain\Theory\Models\Scale;
use Illuminate\Database\Seeder;

class TheorySeeder extends Seeder
{
    public function run(): void
    {
        Interval::insert([
            [ 'name' => 'Perfect Unison',     'abbr' => 'P1', 'steps' => 0,  'degree' => '1' ],
            [ 'name' => 'Diminished Second',  'abbr' => 'd2', 'steps' => 0,  'degree' => 'bb2' ],
            [ 'name' => 'Minor Second',       'abbr' => 'm2', 'steps' => 1,  'degree' => 'b2' ],
            [ 'name' => 'Augmented Unison',   'abbr' => 'A1', 'steps' => 1,  'degree' => '#1' ],
            [ 'name' => 'Major Second',       'abbr' => 'M2', 'steps' => 2,  'degree' => '2' ],
            [ 'name' => 'Diminished Third',   'abbr' => 'd3', 'steps' => 2,  'degree' => 'bb3' ],
            [ 'name' => 'Minor Third',        'abbr' => 'm3', 'steps' => 3,  'degree' => 'b3' ],
            [ 'name' => 'Augmented Second',   'abbr' => 'A2', 'steps' => 3,  'degree' => '#2' ],
            [ 'name' => 'Major Third',        'abbr' => 'M3', 'steps' => 4,  'degree' => '3' ],
            [ 'name' => 'Diminished Fourth',  'abbr' => 'd4', 'steps' => 4,  'degree' => 'bb4' ],
            [ 'name' => 'Perfect Fourth',     'abbr' => 'P4', 'steps' => 5,  'degree' => '4' ],
            [ 'name' => 'Augmented Third',    'abbr' => 'A3', 'steps' => 5,  'degree' => '#3' ],
            [ 'name' => 'Diminished Fifth',   'abbr' => 'd5', 'steps' => 6,  'degree' => 'bb5' ],
            [ 'name' => 'Augmented Fourth',   'abbr' => 'A4', 'steps' => 6,  'degree' => '#4' ],
            [ 'name' => 'Perfect Fifth',      'abbr' => 'P5', 'steps' => 7,  'degree' => '5' ],
            [ 'name' => 'Diminished Sixth',   'abbr' => 'd6', 'steps' => 7,  'degree' => 'bb6' ],
            [ 'name' => 'Minor Sixth',        'abbr' => 'm6', 'steps' => 8,  'degree' => 'b6' ],
            [ 'name' => 'Augmented Fifth',    'abbr' => 'A5', 'steps' => 8,  'degree' => '#5' ],
            [ 'name' => 'Major Sixth',        'abbr' => 'M6', 'steps' => 9,  'degree' => '6' ],
            [ 'name' => 'Diminished Seventh', 'abbr' => 'd7', 'steps' => 9,  'degree' => 'bb7' ],
            [ 'name' => 'Minor Seventh',      'abbr' => 'm7', 'steps' => 10, 'degree' => 'b7' ],
            [ 'name' => 'Augmented Sixth',    'abbr' => 'A6', 'steps' => 10, 'degree' => '#6' ],
            [ 'name' => 'Major Seventh',      'abbr' => 'M7', 'steps' => 11, 'degree' => '7' ],
            [ 'name' => 'Diminished Octave',  'abbr' => 'd8', 'steps' => 11, 'degree' => 'bb8' ],
            [ 'name' => 'Perfect Octave',     'abbr' => 'P8', 'steps' => 12, 'degree' => '8' ],
            [ 'name' => 'Augmented Seventh',  'abbr' => 'A7', 'steps' => 12, 'degree' => '#7' ],
        ]);

        Chord::insert([
            [ 'name' => 'Major',      'abbr' => 'maj', 'formula' => '1-3-5' ],
            [ 'name' => 'Minor',      'abbr' => 'm',   'formula' => '1-b3-5' ],
            [ 'name' => 'Diminished', 'abbr' => 'dim', 'formula' => '1-b3-b5' ],
            [ 'name' => 'Augmented',  'abbr' => 'aug', 'formula' => '1-3-#5' ],
        ]);

        Scale::insert([
            [ 'name' => 'Major', 'formula' => '1-2-3-4-5-6-7' ],
            [ 'name' => 'Minor', 'formula' => '1-2-b3-4-5-b6-b7' ],
        ]);

        Note::insert([
            [ 'name' => 'Ab', 'signature' => 'bbbb',     'is_natural' => false, 'is_accidental' => true,  'is_flat' => true,  'is_sharp' => false ],
            [ 'name' => 'A',  'signature' => 'n',        'is_natural' => true,  'is_accidental' => false, 'is_flat' => false, 'is_sharp' => false ],
            [ 'name' => 'A#', 'signature' => '##x##xx#', 'is_natural' => false, 'is_accidental' => true,  'is_flat' => false, 'is_sharp' => true ],
            [ 'name' => 'Bb', 'signature' => 'bb',       'is_natural' => false, 'is_accidental' => true,  'is_flat' => true,  'is_sharp' => false ],
            [ 'name' => 'B',  'signature' => '##',       'is_natural' => true,  'is_accidental' => false, 'is_flat' => false, 'is_sharp' => false ],
            [ 'name' => 'C',  'signature' => 'n',        'is_natural' => true,  'is_accidental' => false, 'is_flat' => false, 'is_sharp' => false ],
            [ 'name' => 'C#', 'signature' => '####',     'is_natural' => false, 'is_accidental' => true,  'is_flat' => false, 'is_sharp' => true ],
            [ 'name' => 'Db', 'signature' => 'bbbbb',    'is_natural' => false, 'is_accidental' => true,  'is_flat' => true,  'is_sharp' => false ],
            [ 'name' => 'D',  'signature' => '##',       'is_natural' => true,  'is_accidental' => false, 'is_flat' => false, 'is_sharp' => false ],
            [ 'name' => 'D#', 'signature' => '##x###x#', 'is_natural' => false, 'is_accidental' => true,  'is_flat' => false, 'is_sharp' => true ],
            [ 'name' => 'Eb', 'signature' => 'bbb',      'is_natural' => false, 'is_accidental' => true,  'is_flat' => true,  'is_sharp' => false ],
            [ 'name' => 'E',  'signature' => '####',     'is_natural' => true,  'is_accidental' => true,  'is_flat' => false, 'is_sharp' => false ],
            [ 'name' => 'F',  'signature' => 'b',        'is_natural' => true,  'is_accidental' => false, 'is_flat' => false, 'is_sharp' => false ],
            [ 'name' => 'F#', 'signature' => '######',   'is_natural' => false, 'is_accidental' => true,  'is_flat' => false, 'is_sharp' => true ],
            [ 'name' => 'Gb', 'signature' => 'bbbbbb',   'is_natural' => false, 'is_accidental' => true,  'is_flat' => true,  'is_sharp' => false ],
            [ 'name' => 'G',  'signature' => '#',        'is_natural' => false, 'is_accidental' => false, 'is_flat' => false, 'is_sharp' => false ],
            [ 'name' => 'G#', 'signature' => '######x',  'is_natural' => false, 'is_accidental' => true,  'is_flat' => false, 'is_sharp' => true ],
        ]);
    }
}
