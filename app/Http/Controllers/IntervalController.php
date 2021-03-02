<?php

namespace App\Http\Controllers;

use App\Contracts\Services\IntervalService;
use App\Http\Requests\IntervalFormRequest;
use App\Http\Resources\IntervalResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IntervalController
{
    protected IntervalService $interval;

    public function __construct(IntervalService $interval)
    {
        $this->interval = $interval;
    }

    public function index(): ResourceCollection
    {
        return IntervalResource::collection($this->intervals->all());
    }

    public function show(int $id): IntervalResource
    {
        return new IntervalResource($this->interval->find($id));
    }

    public function store(IntervalFormRequest $request): IntervalResource
    {
        return new IntervalResource($this->interval->create($request->validated()));
    }

    public function update(int $id, IntervalFormRequest $request): IntervalResource
    {
        return new IntervalResource($this->interval->update($id, $request->validated()));
    }

    public function delete(int $id): IntervalResource
    {
        return new IntervalResource($this->interval->delete($interval));
    }
}
