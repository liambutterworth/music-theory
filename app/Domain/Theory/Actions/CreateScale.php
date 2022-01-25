<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Scale;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CreateScale
{
    public function __construct(
        private SyncChordIntervals $syncChordIntervals,
    ) {}

    public function execute(array $data): Scale
    {
        Validator::make($data, [
            'name' => 'required|string',
            'formula' => 'string',
        ])->validate();

        $scale = new Scale;

        $scale->name = Arr::get($data, 'name');

        $scale->save();

        if (Arr::has($data, 'formula')) {
            $this->syncScaleIntervals->execute($scale, Arr::get($data, 'formula'));
        }

        return $scale;
    }
}
