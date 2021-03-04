<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Interval;

class CreateIntervalAction
{
    public function execute(array $data): Interval
    {
        return Interval::create($data);
    }
}
