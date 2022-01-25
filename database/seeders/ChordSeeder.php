<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\CreateChord;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ChordSeeder extends Seeder
{
    public function run(CreateChord $createChord): void
    {
        $chords = json_decode(File::get('database/data/chords.json'), true);

        foreach ($chords as $chord) {
            $createChord->execute($chord);
        }
    }
}
