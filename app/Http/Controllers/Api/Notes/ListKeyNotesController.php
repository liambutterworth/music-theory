<?php

namespace App\Http\Controllers\Api\Notes;

use App\Domain\Theory\Models\Note;
use App\Domain\Theory\Actions\GetKeyNotesAction;
use App\Http\Resources\NoteResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ListKeyNotesController
{
    public function __invoke(
        Note $note,
        GetKeyNotesAction $action
    ): ResourceCollection {
        $notes = $action->execute($note);

        dd($notes);
    }
}
