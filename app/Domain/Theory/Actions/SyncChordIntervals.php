<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;

class SyncChordIntervals
{
    public function execute(
        Chord $chord,
        IntervalCollection|string $intervals
    ): Chord {
        if (is_string($intervals)) {
            $intervals = Interval::fromFormula($intervals);
        }

        $chord->intervals()->sync($intervals->pluck('id'));

        return $chord;
    }
}
