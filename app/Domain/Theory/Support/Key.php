<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Collections\NoteCollection;
use App\Domain\Theory\Models\Note;

class Key
{
    const I = 1;
    const ii = 2;
    const iii = 3;
    const IV = 4;
    const V = 5;
    const vi = 6;
    const vii = 7;
    const IONIAN = 1;
    const DORIAN = 2;
    const PHRYGIAN = 3;
    const LYDIAN = 4;
    const MIXOLYDIAN = 5;
    const AEOLIAN = 6;
    const LOCRIAN = 7;

    protected NoteCollection $notes;

    public function __construct(
        protected Note $root,
    ) {}

    public static function fromRoot(string $root): self
    {
        return new static(Note::fromName($root));
    }

    public function ionian(): NoteCollection
    {
        return $this->notes->invert(static::IONIAN);
    }

    public function dorian(): NoteCollection
    {
        return $this->notes->invert(static::DORIAN);
    }

    public function phrygian(): NoteCollection
    {
        return $this->notes->invert(static::PHRYGIAN);
    }

    public function lydian(): NoteCollection
    {
        return $this->notes->invert(static::LYDIAN);
    }

    public function mixolydian(): NoteCollection
    {
        return $this->notes->invert(static::MIXOLYDIAN);
    }

    public function aeolian(): NoteCollection
    {
        return $this->notes->invert(static::AEOLIAN);
    }

    public function locrain(): NoteCollection
    {
        return $this->notes->invert(static::LOCRIAN);
    }
}
