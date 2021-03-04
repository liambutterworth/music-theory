<?php

namespace App\Http\Controllers\Api\Chords;

use App\Domain\Theory\Models\Chord;
use App\Http\Resources\ChordResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ListChordsController
{
    public function __invoke(): ResourceCollection
    {
        $chords = Chord::paginate();

        return ChordResource::collection($chords);
    }
}
