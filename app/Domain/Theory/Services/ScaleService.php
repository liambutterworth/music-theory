<?php

namespace App\Domain\Theory\Services;

use App\Contracts\Services\ScaleService as Contract;
use App\Domain\Theory\Collections\ScaleCollection;
use App\Domain\Theory\Models\Scale;
use Illuminate\Pagination\LengthAwarePaginator;

class ScaleService implements Contract
{
    protected IntervalService $interval;

    public function __construct(IntervalService $interval)
    {
        $this->interval = $interval;
    }

    public function all(): ScaleCollection
    {
        return Scale::all();
    }

    public function paginate(): LengthAwarePaginator
    {
        return Scale::paginate();
    }

    public function find(int $id): Scale
    {
        return Scale::find($id);
    }

    public function create(array $data): Scale
    {
        return tap(Scale::create($data), function($scale) {
            $intervals = $this->interval->getFromFormula($scale->formula);

            $scale->intervals()->attach($intervals->pluck('id'));
        });
    }

    public function update(int $id, array $data): Scale
    {
        return tap($this->find($id), function($scale) use($data) {
            $scale->fill($data)->save();

            if ($scale->wasChanged('formula')) {
                $intervals = $this->interval->getFromFormula($scale->formula);

                $scale->intervals()->sync($intervals);
            }
        });
    }

    public function delete(int $id): Scale
    {
        return tap($this->find($id), function($scale) {
            $scale->delete();
        });
    }
}
