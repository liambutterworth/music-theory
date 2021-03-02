<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ChordService;
use App\Http\Requests\ChordFormRequest;
use App\Http\Resources\ChordResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChordController
{
    protected ChordService $chord;

    public function __construct(ChordService $chord)
    {
        $this->chord = $chord;
    }

    public function index(): ResourceCollection
    {
        return ChordResource::collection($this->chord->paginate());
    }

    public function show(int $id): ChordResource
    {
        return new ChordResource($this->chord->find($id));
    }

    public function store(ChordFormRequest $request): ChordResource
    {
        return new ChordResource($this->chord->create($request->validated()));
    }

    public function update(int $id, ChordFormRequest $request): ChordResource
    {
        return new ChordResource($this->chord->update($id, $request->validated()));
    }

    public function delete(int $id): ChordResource
    {
        return new ChordResource($this->chord->delete($id));
    }
}
