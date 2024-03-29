<?php

namespace Database\Seeders;

use App\Domain\Theory\Models\Interval;
use Illuminate\Database\Seeder;

class IntervalSeeder extends Seeder
{
    public function run(): void
    {
        Interval::createMany([
            [ 'name' => 'Perfect Unison',     'abbr' => 'P1', 'degree' => '1',   'steps' => 0 ],
            [ 'name' => 'Diminished Second',  'abbr' => 'd2', 'degree' => 'bb2', 'steps' => 0 ],
            [ 'name' => 'Minor Second',       'abbr' => 'm2', 'degree' => 'b2',  'steps' => 1 ],
            [ 'name' => 'Augmented Unison',   'abbr' => 'A1', 'degree' => '#1',  'steps' => 1 ],
            [ 'name' => 'Major Second',       'abbr' => 'M2', 'degree' => '2',   'steps' => 2 ],
            [ 'name' => 'Diminished Third',   'abbr' => 'd3', 'degree' => 'bb3', 'steps' => 2 ],
            [ 'name' => 'Minor Third',        'abbr' => 'm3', 'degree' => 'b3',  'steps' => 3 ],
            [ 'name' => 'Augmented Second',   'abbr' => 'A2', 'degree' => '#2',  'steps' => 3 ],
            [ 'name' => 'Major Third',        'abbr' => 'M3', 'degree' => '3',   'steps' => 4 ],
            [ 'name' => 'Diminished Fourth',  'abbr' => 'd4', 'degree' => 'bb4', 'steps' => 4 ],
            [ 'name' => 'Perfect Fourth',     'abbr' => 'P4', 'degree' => '4',   'steps' => 5 ],
            [ 'name' => 'Augmented Third',    'abbr' => 'A3', 'degree' => '#3',  'steps' => 5 ],
            [ 'name' => 'Diminished Fifth',   'abbr' => 'd5', 'degree' => 'bb5', 'steps' => 6 ],
            [ 'name' => 'Augmented Fourth',   'abbr' => 'A4', 'degree' => '#4',  'steps' => 6 ],
            [ 'name' => 'Perfect Fifth',      'abbr' => 'P5', 'degree' => '5',   'steps' => 7 ],
            [ 'name' => 'Diminished Sixth',   'abbr' => 'd6', 'degree' => 'bb6', 'steps' => 7 ],
            [ 'name' => 'Minor Sixth',        'abbr' => 'm6', 'degree' => 'b6',  'steps' => 8 ],
            [ 'name' => 'Augmented Fifth',    'abbr' => 'A5', 'degree' => '#5',  'steps' => 8 ],
            [ 'name' => 'Major Sixth',        'abbr' => 'M6', 'degree' => '6',   'steps' => 9 ],
            [ 'name' => 'Diminished Seventh', 'abbr' => 'd7', 'degree' => 'bb7', 'steps' => 9 ],
            [ 'name' => 'Minor Seventh',      'abbr' => 'm7', 'degree' => 'b7',  'steps' => 10 ],
            [ 'name' => 'Augmented Sixth',    'abbr' => 'A6', 'degree' => '#6',  'steps' => 10 ],
            [ 'name' => 'Major Seventh',      'abbr' => 'M7', 'degree' => '7',   'steps' => 11 ],
            [ 'name' => 'Diminished Octave',  'abbr' => 'd8', 'degree' => 'bb8', 'steps' => 11 ],
            [ 'name' => 'Perfect Octave',     'abbr' => 'P8', 'degree' => '8',   'steps' => 12 ],
            [ 'name' => 'Augmented Seventh',  'abbr' => 'A7', 'degree' => '#7',  'steps' => 12 ],
        ]);
    }
}
