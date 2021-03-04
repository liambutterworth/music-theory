<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Scale;
use App\Domain\Theory\Models\Interval;

class UpdateScaleAction
{
    public function execute(int $id, array $data): Scale
    {
        Scale::where('id', $id)->update($data);
    }
}
