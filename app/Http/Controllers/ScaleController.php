<?php

namespace App\Http\Controllers;

use App\Domain\Theory\Services\ScaleService;
use App\Http\Resources\ScaleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScaleController extends Controller
{
    protected ScaleService $scale;
    protected Request $request;

    public function __construct(ScaleService $scale, Request $request)
    {
        $this->scale = $scale;
        $this->request = $request;
    }

    public function index(): ResourceCollection
    {
        $paginated = $this->scale->paginate();

        return ScaleResource::collection($paginated);
    }

    public function show(int $id): ScaleResource
    {
        $scale = $this->scale->find($id);

        return new ScaleResource($scale);
    }

    public function store(): ScaleResource
    {
        $data = $this->request->all();
        $scale = $this->scale->create($data);

        return new ScaleResource($this->scale->create($this->request->all()));
    }

    public function update(int $id): ScaleResource
    {
        $data = $this->request->all();
        $scale = $this->scale->update($id, $data);

        return new ScaleResource($scale);
    }

    public function delete(int $id): ScaleResource
    {
        $scale = $this->scale->find($id);

        return new ScaleResource($scale);
    }
}
