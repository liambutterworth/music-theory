<?php

namespace App\Http\Controllers\Api\Chords;

use App\Domain\Theory\Models\Chord;
use App\Http\Resource\ChordResource;

class FindChordController
{
    public function __invoke(int $id): ChordResource
    {
        $chord = Chord::find($id);

        return new ChordResource($chord);
    }
}
