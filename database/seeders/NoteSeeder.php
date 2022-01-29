<?php

namespace Database\Seeders;

use App\Domain\Theory\Actions\FetchOrCreateNote;
use App\Domain\Theory\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Note::REAL_NAMES as $name) {
            FetchOrCreateNote::execute('A##');
        }
    }
}
