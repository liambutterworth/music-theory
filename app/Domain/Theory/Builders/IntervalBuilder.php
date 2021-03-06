<?php

namespace App\Domain\Theory\Builders;

use Illuminate\Database\Eloquent\Builder;

class IntervalBuilder extends Builder
{
    public function formula($formula): self
    {
        return $this->whereIn('degree', explode('-', $formula));
    }

    public function major(): self
    {
        return $this->ionian();
    }

    public function minor(): self
    {
        return $this->aeolian();
    }

    public function ionian(): self
    {
        return $this->formula('1-2-3-4-5-6-7');
    }

    public function dorian(): self
    {
        return $this->formula('1-2-b3-4-5-6-b7');
    }

    public function phrygian(): self
    {
        return $this->formula('1-b2-b3-4-5-b6-b7');
    }

    public function lydian(): self
    {
        return $this->formula('1-2-3-#4-5-6-7');
    }

    public function mixolydian(): self
    {
        return $this->formula('1-2-3-4-5-6-b7');
    }

    public function aeolian(): self
    {
        return $this->formula('1-2-b3-4-5-b6-b7');
    }

    public function locrian(): self
    {
        return $this->formula('1-b2-b3-4-b5-b6-b7');
    }
}
