<?php

namespace App\Domain\Theory\Services;

use App\Contracts\Services\IntervalService as Contract;
use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Models\Interval;
use Illuminate\Pagination\LengthAwarePaginator;

class IntervalService implements Contract
{
    public function all(): IntervalCollection
    {
        return Interval::all();
    }

    public function paginate(): LengthAwarePaginator
    {
        return Interaval::paginate();
    }

    public function find(int $id): Interval
    {
        return Interval::find($id);
    }

    public function create(array $data): Interval
    {
        $validated = $this->validate($data, [
            'name' => 'required',
            'abbr' => 'required',
            'steps' => 'required',
            'degree' => 'required',
        ]);

        return Interval::create($validated);
    }

    public function update(int $id, array $data): Interval
    {
        return tap($this->find($id), function($interval) use($data) {
            $interval->fill($data)->save();
        });
    }

    public function delete(int $id): Interval
    {
        return tap($this->find($id), function($interval) {
            $interval->delete();
        });
    }

    public function getFromFormula(string $formula): IntervalCollection
    {
        return Interval::whereInFormula($formula)->get();
    }
}
