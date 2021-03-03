<?php

namespace App\Http\Controllers\Api\Notes;

use App\Domain\Theory\Models\Note;
use App\Http\Resource\NoteResource;
use Illumiinate\Http\Resources\Json\ResourceCollection;

class ListNotesController
{
    public function __invoke(): ResourceCollection
    {
        $notes = Note::paginate();

        return NoteResource::collection($notes);
    }
}
