<?php

namespace App\Http\Controllers\Api\Scales;

use App\Domain\Theory\Models\Scale;
use App\Http\Resource\ScaleResource;
use Illumiinate\Http\Resources\Json\ResourceCollection;

class ListScalesController
{
    public function __invoke(): ResourceCollection
    {
        $scales = Scale::paginate();

        return ScaleResource::collection($scales);
    }
}
