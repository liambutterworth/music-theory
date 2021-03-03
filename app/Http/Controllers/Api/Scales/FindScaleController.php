<?php

namespace App\Http\Controllers\Api\Scales;

use App\Domain\Theory\Models\Scale;
use App\Http\Resource\ScaleResource;

class FindScaleController
{
    public function __invoke(int $id): ScaleResource
    {
        $scale = Scale::find($id);

        return new ScaleResource($scale);
    }
}
