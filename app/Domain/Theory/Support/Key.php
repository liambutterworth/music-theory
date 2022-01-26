<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Models\Note;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Key
{
    public function __construct(
        protected NoteCollection $notes,
    ) {}

    protected static function getAllNotes(): NoteCollection
    {
        return Cache::rememberForever('all_notes', function() {
            return Note::all();
        });
    }

    protected static function resolveToReal(string $name): ?string
    {
        $notes = static::getAllNotes();

        if ($notes->contains('name', $name)) {
            return $notes->firstWhere('name', $name);
        }

        $signs = Str::of($name)->matchAll('/([A-G]|b|#)/')->pad(2, null);
        $letter = $signs->shift();
        $raised = static::incrementLetter($letter);
        $lowered = static::decrementLetter($letter);

        dd($letter, $raised, $lowered);

        if ($signs->contains('#')) {
            dd('raised', $letter + 1);
        }

        dd($letter, $signs);
    }

    protected static function incrementLetter(string $letter): string
    {
    }

    protected static function decrementLetter(string $letter): string
    {
        return chr(ord($letter) - 1);
    }

    public static function root(string $root): self
    {
        $real = static::resolveToReal($root);

        dd($real);
    }
}
