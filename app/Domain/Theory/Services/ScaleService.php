<?php

namespace App\Domain\Theory\Services;

use App\Domain\Concerns\ManagesModel;
use App\Domain\Concerns\ValidatesData;
use App\Domain\Theory\Models\Scale;
use Illuminate\Support\Facades\Validator;

class ScaleService
{
    use ManagesModel, ValidatesData;

    protected IntervalService $interval;

    public function __construct(IntervalService $interval)
    {
        $this->interval = $interval;
    }

    protected function model(): string
    {
        return Scale::class;
    }

    protected function rules(): array
    {
        return [
            'name' => 'string',
            'formula' => 'string',
        ];
    }

    public function create(array $data): Scale
    {
        $validated = $this->validate($data, [
            'name' => 'required',
            'formula' => 'required',
        ]);

        return tap(Scale::create($validated), function($scale) {
            $intervals = $this->interval->getFromFormula($scale->formula);

            $scale->intervals()->attach($intervals->pluck('id'));
        });
    }

    public function update(int $id, array $data): Scale
    {
        return tap($this->find($id), function($scale) use($data) {
            $scale->fill($this->validate($data))->save();

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
