<?php

namespace Database\Seeders;

use App\Domain\Theory\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        Note::createMany([
            [ 'name' => 'C' ],
            [ 'name' => 'C#' ],
            [ 'name' => 'Db' ],
            [ 'name' => 'D' ],
            [ 'name' => 'D#' ],
            [ 'name' => 'Eb' ],
            [ 'name' => 'E' ],
            [ 'name' => 'F' ],
            [ 'name' => 'F#' ],
            [ 'name' => 'Gb' ],
            [ 'name' => 'G' ],
            [ 'name' => 'G#' ],
            [ 'name' => 'Ab' ],
            [ 'name' => 'A' ],
            [ 'name' => 'A#' ],
            [ 'name' => 'Bb' ],
            [ 'name' => 'B' ],
        ]);
    }
}
