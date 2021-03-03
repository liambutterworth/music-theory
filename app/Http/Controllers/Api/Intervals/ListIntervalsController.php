<?php

namespace App\Http\Controllers\Api\Intervals;

use App\Domain\Theory\Models\Interval;
use App\Http\Resource\IntervalResource;
use Illumiinate\Http\Resources\Json\ResourceCollection;

class ListIntervalsController
{
    public function __invoke(): ResourceCollection
    {
        $interval = Interval::paginate();

        return IntervalResource::collection($interval);
    }
}
