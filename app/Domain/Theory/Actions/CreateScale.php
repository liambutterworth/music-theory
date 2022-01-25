<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Data\ScaleData;
use App\Domain\Theory\Models\Scale;

class CreateScale
{
    public function execute(ScaleData $data): Scale
    {
        $scale = new Scale;

        $scale->name = $data->name;

        $scale->save();

        return $scale;
    }
}
