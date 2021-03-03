<?php

namespace App\Http\Controllers\Api\Scales;

use App\Domain\Theory\Actions\CreateScaleAction;
use App\Http\Requests\Requests\CreateScaleRequest;
use App\Http\Resources\ScaleResource;

class CreateScalesController
{
    public function __invoke(
        CreateScaleRequest $request,
        CreateScaleAction $action
    ): CordResource {
        $data = $request->validated();
        $scale = $action->execute($data);

        return new ScaleResource($scale);
    }
}
