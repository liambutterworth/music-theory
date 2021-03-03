<?php

namespace App\Http\Controllers\Api\Chords;

use App\Domain\Theory\Actions\UpdateChordAction;
use App\Http\Requests\UpdateChordRequest;
use App\Http\Resources\ChordResource;

class UpdateChordController
{
    public function __invoke(
        int $id,
        UpdateChordAction $action,
        UpdateChordRequest $request
    ): ChordResource {
        $data = $request->validated();
        $chord = $action->update($id, $data);

        return new ChordResource($chord);
    }
}
