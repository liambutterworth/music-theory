<?php

namespace App\Http\Controllers;

use App\Domain\Theory\Services\IntervalService;
use App\Http\Resources\IntervalResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IntervalController
{
    protected IntervalService $interval;
    protected Request $request;

    public function __construct(IntervalService $interval, Request $request)
    {
        $this->interval = $interval;
        $this->request = $request;
    }

    public function index(): ResourceCollection
    {
        $intervals = $this->interval->all();

        return IntervalResource::collection($intervals);
    }

    public function show(int $id): IntervalResource
    {
        $interval = $this->interval->find($id);

        return new IntervalResource($interval);
    }

    public function store(): IntervalResource
    {
        $data = $this->request->all();
        $interval = $this->interval->create($data);

        return new IntervalResource($interval);
    }

    public function update(int $id): IntervalResource
    {
        $data = $this->request->all();
        $interval = $this->interval->update($id, $data);

        return new IntervalResource($interval);
    }

    public function delete(int $id): IntervalResource
    {
        $interval = $this->interval->delete($interval);

        return new IntervalResource($interval);
    }
}
