<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Chord;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CreateChord
{
    public function __construct(
        private SyncChordIntervals $syncChordIntervals,
    ) {}

    public function execute(array $data): Chord
    {
        Validator::make($data, [
            'name' => 'required|string',
            'symbol' => 'required|string',
            'intervals' => 'array',
        ])->validate();

        $chord = new Chord;

        $chord->name = Arr::get($data, 'name');
        $chord->symbol = Arr::get($data, 'symbol');

        $chord->save();

        if (Arr::has($data, 'intervals')) {
            $this->syncChordIntervals->execute(Arr::get($data, 'intervals'));
        }

        return $chord;
    }
}
