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

    public function invert(string|int $inversion): self
    {
        return match (gettype($inversion)) {
            'integer' => $this->invertByIndex($inversion),
            'string' => $this->invertByName($inversion),
        };
    }

    public function invertByIndex(int $index): self
    {
        return $this->skip($index)->merge($this->take($index));
    }

    public function invertByName(string $name): self
    {
        return $this->skipUntil(function($note) use($name) {
            return $note->name === $name;
        })->merge($this->takeUntil(function($note) use($name ) {
            return $note->name === $name;
        }));
    }
}
