<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ScaleService;
use App\Http\Requests\ScaleFormRequest;
use App\Http\Resources\ScaleResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScaleController
{
    protected ScaleService $scale;

    public function __construct(ScaleService $scale)
    {
        $this->scale = $scale;
    }

    public function index(): ResourceCollection
    {
        return ScaleResource::collection($this->scale->paginate());
    }

    public function show(int $id): ScaleResource
    {
        return new ScaleResource($this->scale->find($id));
    }

    public function store(ScaleFormRequest $request): ScaleResource
    {
        return new ScaleResource($this->scale->create($request->validated()));
    }

    public function update(int $id): ScaleResource
    {
        return new ScaleResource($this->scale->udpate($id, $request->validated()));
    }

    public function delete(int $id): ScaleResource
    {
        return new ScaleResource($this->scale->find($id));
    }
}
