<?php

namespace App\Http\Controllers\Api\Chords;

use App\Domain\Theory\Actions\CreateChordAction;
use App\Http\Requests\Requests\CreateChordRequest;
use App\Http\Resources\ChordResource;

class CreateChordController
{
    public function __invoke(
        CreateChordAction $action,
        CreateChordRequest $request
    ): ChordResource {
        $data = $request->validated();
        $chord = $action->execute($data);

        return new ChordResource($chord);
    }
}
