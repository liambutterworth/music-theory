<?php

namespace App\Http\Controllers\Api\Notes;

use App\Domain\Theory\Models\Note;
use App\Http\Resource\NoteResource;

class FindNoteController
{
    public function __invoke(int $id): NoteResource
    {
        $note = Note::find($id);

        return new NoteResource($note);
    }
}
