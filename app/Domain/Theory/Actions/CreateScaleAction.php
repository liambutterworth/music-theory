<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Scale;
use App\Domain\Theory\Models\Interval;

class CreateScaleAction
{
    public function execute(array $data): Scale
    {
        return Scale::create($data);
    }
}
