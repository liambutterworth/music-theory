<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Note;

class CreateNoteAction
{
    public function execute(array $data): Note
    {
        return Note::create($data);
    }
}
