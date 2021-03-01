<?php

namespace App\Http\Controllers;

use App\Domain\Theory\Services\ChordService;
use App\Http\Resources\ChordResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChordController
{
    protected ChordService $chord;
    protected Request $request;

    public function __construct(ChordService $chord, Request $request)
    {
        $this->chord = $chord;
        $this->request = $request;
    }

    public function index(): ResourceCollection
    {
        $paginated = $this->chord->paginate();

        return ChordResource::collection($paginated);
    }

    public function show(int $id): ChordResource
    {
        $chord = $this->chord->find($id);

        return new ChordResource($chord);
    }

    public function store(): ChordResource
    {
        $data = $this->request->all();
        $chord = $this->chord->create($data);

        return new ChordResource($chord);
    }

    public function update(int $id): ChordResource
    {
        $data = $this->request->all();
        $chord = $this->chord->update($id, $data);

        return new ChordResource($chord);
    }

    public function delete(int $id): ChordResource
    {
        $chord = $this->chord->delete($id);

        return new ChordResource($chord);
    }
}
