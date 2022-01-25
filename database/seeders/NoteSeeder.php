<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\CreateNote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class NoteSeeder extends Seeder
{
    public function run(CreateNote $createNote): void
    {
        $notes = json_decode(File::get('database/data/notes.json'), true);

        foreach ($notes as $note) {
            $createNote->execute($note);
        }
    }
}
