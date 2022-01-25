<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Models\Interval;
use App\Domain\Theory\Models\Scale;

class SyncScaleIntervals
{
    public function execute(
        Scale $scale,
        IntervalCollection|string $intervals
    ): Scale {
        if (is_string($intervals)) {
            $intervals = Interval::fromFormula($intervals);
        }

        $scale->intervals()->sync($intervals->pluck('id'));

        return $scale;
    }
}
