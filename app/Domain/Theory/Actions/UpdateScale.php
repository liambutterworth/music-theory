<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Scale;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class UpdateScale
{
    public function execute(array $data): Scale
    {
        $validated = Validator::make($data, [
            'name' => 'required|string',
            'formula' => 'string',
        ])->validated();

        $formula = Arr::pull($validated, 'formula');
        $scale = new Scale($validated);

        $scale->save();

        if ($formula) {
            $this->syncScaleIntervals->execute($scale, $formula);
        }

        return $scale;
    }
}
