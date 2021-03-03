<?php

namespace App\Http\Controllers\Intervals;

use App\Domain\Theory\Models\Interval;
use App\Http\Resource\IntervalResource;

class FindIntervalController
{
    public function __invoke(int $id): IntervalResource
    {
        $interval = Interval::find($id);

        return new IntervalResource($interval);
    }
}
