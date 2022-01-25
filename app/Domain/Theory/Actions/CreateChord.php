<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CreateChord
{
    public function execute(array $data): Chord
    {
        Validator::make($data, [
            'name' => 'required|string',
            'symbol' => 'required|string',
            'intervals' => 'array',
            'intervals.*' => 'numeric',
            'formula' => 'string',
        ])->validate();

        $chord = new Chord;

        $chord->name = Arr::get($data, 'name');
        $chord->symbol = Arr::get($data, 'symbol');

        if (Arr::hasAny($data, 'intervals', 'formula')) {
            $intervals = Arr::has($data, 'intervals')
                ? Arr::get($data, 'intervals')
                : Interval::fromFormula(Arr::get($data, 'formula'));

            $chord->intervals()->sync($intervals);
        }

        $chord->save();

        return $chord;
    }
}
