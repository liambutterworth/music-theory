<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NoteService;
use App\Http\Requests\NoteFormRequest;
use App\Http\Resources\NoteResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NoteController
{
    protected NoteService $note;

    public function __construct(NoteService $note)
    {
        $this->note = $note;
    }

    public function index(): ResourceCollection
    {
        return NoteResource::collection($this->note->all());
    }

    public function key(int $id): ResourceCollection
    {
        return NoteResource::collection($this->note->getKey($id));
    }

    public function show(int $id): NoteResource
    {
        return new NoteResource($this->note->find($id));
    }

    public function store(NoteFormRequest $request): NoteResource
    {
        return new NoteResource($this->note->create($request->validated()));
    }

    public function update(int $id, NoteFormRequest $request): NoteResource
    {
        return new NoteResource($this->note->update($id, $request->validated()));
    }

    public function delete(int $id): NoteResource
    {
        return new NoteResource($this->note->delete($id));
    }
}
