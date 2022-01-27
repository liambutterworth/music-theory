<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Models\Note;
use Illuminate\Support\Str;

class NoteResolver
{
    public static function note(string $name): Note
    {
        if (Note::where('name', $name)->exists()) {
            return Note::where('name', $name)->first();
        }

        $letter = new Letter($name);
        $signs = Str::matchAll('/#|b/', $name);
        $isSharp = $signs->contains('#');
        $isFlat = !$isSharp;
        $hasOneSign = $signs->count() === 1;
        $hasMultipleSigns = !$hasOneSign;

        if ($isFlat && $hasOneSign) {
            return Note::name($letter->lower());
        } else if ($isSharp && $hasOneSign) {
            return Note::name($letter->raise());
        } else if ($isFlat && $hasMultipleSigns) {
            $names = Note::preferFlats()->get()->pluck('name');
            $index = $names->search($letter . $signs->shift()) - $signs->count() + 1;
            $note = Note::where('name', $names->splice($index, 1))->first();

            $note->theoretical_name = $name;

            return $note;
        } else if ($isSharp && $hasMultipleSigns) {
            $names = Note::preferSharps()->get()->pluck('name');
            $index = $names->search($letter . $signs->shift()) + $signs->count();

            $note = Note::where('name', $names->splice($index, 1))->first();

            $note->theoretical_name = $name;

            return $note;
        }
    }

    public static function key(): NoteCollection
    {
        return Note::all();
    }
}
