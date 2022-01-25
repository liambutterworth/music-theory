<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Note;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateNote
{
    public function execute(array $data): Note
    {
        Validator::make($data, [
            'name' => 'string|required',
        ])->validate();

        $note = new Note;

        $note->name = Arr::get($data, 'name');
        $note->is_flat = Str::contains($note->name, 'b');
        $note->is_sharp = Str::contains($note->name, '#');
        $note->is_accidental = $note->is_flat || $note->is_sharp;
        $note->is_natural = !$note->is_accidental;

        $note->save();

        return $note;
    }
}
