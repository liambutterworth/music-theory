<?php

namespace App\Domain\Theory\Services;

use App\Contracts\Services\ChordService as Contract;
use App\Domain\Theory\Collections\ChordCollection;
use App\Domain\Theory\Models\Chord;
use Illuminate\Pagination\LengthAwarePaginator;

class ChordService implements Contract
{
    protected IntervalService $interval;

    public function __construct(IntervalService $interval)
    {
        $this->interval = $interval;
    }

    public function all(): ChordCollection
    {
        return Chord::all();
    }

    public function paginate(): LengthAwarePaginator
    {
        return Chord::paginate();
    }

    public function find(int $id): Chord
    {
        return Chord::find($id);
    }

    public function create(array $data): Chord
    {
        return tap(Chord::create($validated), function($chord) {
            $intervals = $this->interval->getFromFormula($chord->formula);

            $chord->intervals()->attach($intervals->pluck('id'));
        });
    }

    public function update(int $id, array $data): Chord
    {
        return tap($this->find($id), function($chord) use($data) {
            $chord->fill($data)->save();

            if ($chord->wasChanged('formula')) {
                $intervals = $this->interval->getFromFormula($chord->formula);

                $chord->intervals()->sync($intervals);
            }
        });
    }

    public function delete(int $id): Chord
    {
        return tap($this->find($id), function($chord) {
            $chord->delete();
        });
    }
}
