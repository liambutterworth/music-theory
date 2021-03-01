<?php

namespace App\Domain\Theory\Services;

use App\Domain\Concerns\ManagesModel;
use App\Domain\Concerns\ValidatesData;
use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Collections\ChordCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ChordService
{
    use ManagesModel, ValidatesData;

    protected IntervalService $interval;

    public function __construct(IntervalService $interval)
    {
        $this->interval = $interval;
    }

    protected function model(): string
    {
        return Chord::class;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'abbr' => 'string',
            'formula' => 'string',
        ];
    }

    public function create(array $data): Chord
    {
        $validated = $this->validate($data, [
            'name' => 'required',
            'abbr' => 'required',
            'formula' => 'required',
        ]);

        return tap(Chord::create($validated), function($chord) {
            $intervals = $this->interval->getFromFormula($chord->formula);

            $chord->intervals()->attach($intervals->pluck('id'));
        });
    }

    public function update(int $id, array $data): Chord
    {
        return tap($this->find($id), function($chord) use($data) {
            $chord->fill($this->validate($data))->save();

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
