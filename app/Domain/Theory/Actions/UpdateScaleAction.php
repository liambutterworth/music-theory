<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Scale;
use App\Domain\Theory\Models\Interval;

class UpdateScaleAction
{
    public function execute(int $id, array $data): Scale
    {
        $chord = Scale::find($id);

        $chord->fill($data)->save();

        if ($chord->wasChanged('formula')) {
            $ids = Interval::whereInFormual($chord->formula)->pluck('id');

            $chord->intervals()->sync($ids);
        }

        return $chord;
    }
}
