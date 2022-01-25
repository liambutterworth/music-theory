<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Interval;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CreateInterval
{
    public function execute(array $data): Interval
    {
        Validator::make($data, [
            'name' => 'required|string',
            'abbr' => 'required|string',
            'degree' => 'required|string',
            'steps' => 'required|numeric',
        ])->validate();

        $interval = new Interval;

        $interval->name = Arr::get($data, 'name');
        $interval->abbr = Arr::get($data, 'abbr');
        $interval->degree = Arr::get($data, 'degree');
        $interval->steps = Arr::get($data, 'steps');

        $interval->save();

        return $interval;
    }
}
