<?php

namespace App\Http\Controllers\Api\Intervals;

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
