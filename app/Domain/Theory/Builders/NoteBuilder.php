<?php

namespace App\Domain\Theory\Builders;

use Illuminate\Database\Eloquent\Builder;

class NoteBuilder extends Builder
{
    public function naturals(): self
    {
        return $this->where('is_natural', true);
    }

    public function accidentals(): self
    {
        return $this->where('is_accidental', true);
    }

    public function flats(): self
    {
        return $this->where('is_flat', true);
    }

    public function sharps(): self
    {
        return $this->where('is_sharp', true);
    }

    public function preferFlats(): self
    {
        return $this->where('is_sharp', false);
    }

    public function preferSharps(): self
    {
        return $this->where('is_flat', false);
    }
}
