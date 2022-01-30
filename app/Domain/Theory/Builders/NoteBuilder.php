<?php

namespace App\Domain\Theory\Builders;

use App\Domain\Theory\Actions\ResolveNote;
use App\Domain\Theory\Models\Note;
use Illuminate\Database\Eloquent\Builder;

class NoteBuilder extends Builder
{
    public function fromName(string $name): Note
    {
        return ResolveNote::execute($name);
    }

    public function real(): self
    {
        return $this->whereIsReal(true);
    }

    public function naturals(): self
    {
        return $this->whereIsNatural(true);
    }

    public function accidentals(): self
    {
        return $this->whereIsAccidental(true);
    }

    public function flats(): self
    {
        return $this->real()->whereIsAccidental(true);
    }

    public function sharps(): self
    {
        return $this->real()->whereIsSharp(true);
    }

    public function preferFlats(): self
    {
        return $this->wherePrefersFlats(true);
    }

    public function preferSharps(): self
    {
        return $this->wherePrefersSharps(true);
    }
}
