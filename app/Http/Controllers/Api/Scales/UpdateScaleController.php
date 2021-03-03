<?php

namespace App\Http\Controllers\Api\Scales;

use App\Domain\Theory\Actions\UpdateScaleAction;
use App\Http\Requests\UpdateScaleRequest;
use App\Http\Resources\ScaleResource;

class UpdateScaleController
{
    public function __invoke(
        int $id,
        UpdateScaleAction $action,
        UpdateScaleRequest $request
    ): ScaleResource {
        $data = $request->validated();
        $scale = $action->update($id, $data);

        return new ScaleResource($scale);
    }
}
