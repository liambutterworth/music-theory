<?php

namespace App\Theory\Collections;

use App\Theory\Note;
use Illuminate\Support\Collection;

class NoteCollection extends Collection
{
    public function __construct(array $items = [])
    {
        parent::__construct(Note::hydrate($items));
    }

    public function invert(string $inversion): self
    {
        return $this->skipUntil(function($note) use($inversion) {
            return $note->name === $inversion;
        })->merge($this->takeUntil(function($note) use($inversion ) {
            return $note->name === $inversion;
        }));
    }
}
