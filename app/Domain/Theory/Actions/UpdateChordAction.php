<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;

class UpdateChordAction
{
    public function execute(int $id, array $data): Chord
    {
        $chord = Chord::find($id);

        $chord->fill($data)->save();

        if ($chord->wasChanged('formula')) {
            $ids = Interval::whereInFormual($chord->formula)->pluck('id');

            $chord->intervals()->sync($ids);
        }

        return $chord;
    }
}
