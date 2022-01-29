<?php

namespace App\Domain\Theory\Collections;

use Illuminate\Database\Eloquent\Collection;

class NoteCollection extends Collection
{
    public function naturals(): self
    {
        return $this->filter(function ($note) {
            return $note->isNatural();
        })->values();
    }

    public function accidentals(): self
    {
        return $this->filter(function ($note) {
            return $note->is_accidental;
        })->values();
    }

    public function flats(): self
    {
        return $this->filter(function ($note) {
            return $note->is_flat;
        })->values();
    }

    public function sharps(): self
    {
        return $this->filter(function ($note) {
            return $note->is_sharp;
        })->values();
    }

    public function preferFlats(): self
    {
        return $this->filter(function ($note) {
            return !$note->is_sharp;
        })->values();
    }

    public function preferSharps(): self
    {
        return $this->filter(function ($note) {
            return !$note->is_flat;
        })->values();
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
