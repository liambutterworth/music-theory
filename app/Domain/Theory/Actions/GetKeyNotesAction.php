<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Interval;
use App\Domain\Theory\Models\Note;
use Illuminate\Support\Str;

class GetKeyNotesAction
{
    public function execute(Note $root)
    {
        $intervals = Interval::major()->get();
        $notes = Note::prefer($root->symbol)->get();

        dd($notes);
    }
}
