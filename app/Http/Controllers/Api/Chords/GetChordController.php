<?php

namespace App\Http\Controllers\Api\Chords;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Support\Theory;

class GetChordController
{
    public function __invoke(Chord $chord)
    {

        return new ChordResource($chord);
    }
}
