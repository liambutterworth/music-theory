<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Interval;
use Illuminate\Support\Facades\Validator;

class UpdateInterval
{
    public function execute(Interval $interval, array $data): Interval
    {
        $validated = Validator::make($data, [
            'name' => 'required|string',
            'abbr' => 'required|string',
            'degree' => 'required|string',
            'steps' => 'required|numeric',
        ])->validated();

        $interval->fill($validated)->save();

        return $interval;
    }
}

