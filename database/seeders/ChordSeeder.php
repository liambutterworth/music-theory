<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\CreateChord;
use App\Domain\Theory\Data\ChordData;
use App\Domain\Theory\Models\Chord;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class ChordSeeder extends Seeder
{
    public function run(CreateChord $createChord): void
    {
        $chords = Chord::all();

        Collection::wrap(
            json_decode(File::get('database/data/chords.json'), true)
        )->filter(function($chord) use($chords) {
            return !$chords->contains('symbol', Arr::get($chord, 'symbol'));
        })->each(function($chord) use($createChord) {
            $createChord->execute(new ChordData(...$chord));
        });
    }
}
