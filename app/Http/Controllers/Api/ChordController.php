<?php

namespace App\Http\Controllers\Api;

use App\Domain\Theory\Actions\CreateChord;
use App\Domain\Theory\Models\Chord;
use App\Http\Resources\ChordCollection;
use App\Http\Resources\ChordResource;
use Illuminate\Http\Request;

class ChordController
{
    public function index(): ChordCollection
    {
        return new ChordCollection(Chord::paginate());
    }

    public function show(Chord $chord): ChordResource
    {
        return new ChordResource($chord);
    }

    public function store(
        CreateChord $createChord,
        Request $request,
    ): ChordResource {
        $chord = $createChord->execute($request->all());

        return new ChordResource($chord);
    }

    public function update(
        Chord $chord,
        UpdateChord $updateChord,
        Request $request,
    ): ChordResource {
        $chord = $updateChord->execute($request->all());

        return new ChordResource($chord);
    }
}
