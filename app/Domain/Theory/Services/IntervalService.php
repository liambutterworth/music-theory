<?php

namespace App\Domain\Theory\Services;

use App\Domain\Concerns\ManagesModel;
use App\Domain\Concerns\ValidatesData;
use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Models\Interval;
use Illuminate\Support\Str;

class IntervalService
{
    use ManagesModel, ValidatesData;

    protected function model(): string
    {
        return Interval::class;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'abbr' => 'string',
            'steps' => 'numeric',
            'degree' => 'string',
        ];
    }

    public function getFromFormula(string $formula): IntervalCollection
    {
        return $this->query()->whereInFormula($formula)->get();
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
            $interval->fill($this->validate($data))->save();
        });
    }

    public function delete(int $id): Interval
    {
        return tap($this->find($id), function($interval) {
            $interval->delete();
        });
    }
}
