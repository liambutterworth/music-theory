<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Scale;
use App\Domain\Theory\Models\Interval;

class CreateScaleAction
{
    public function execute(array $data): Scale
    {
        $chord = Scale::create($data);
        $ids = Interval::whereInFormula($chord->formula)->pluck('id');

        $chord->intervals()->attach($ids);

        return $chord;
    }
}
