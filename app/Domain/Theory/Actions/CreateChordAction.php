<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;

class CreateChordAction
{
    public function execute(array $data): Chord
    {
        $chord = Chord::create($data);
        $ids = Interval::whereInFormula($chord->formula)->pluck('id');

        $chord->intervals()->attach($ids);

        return $chord;
    }
}
