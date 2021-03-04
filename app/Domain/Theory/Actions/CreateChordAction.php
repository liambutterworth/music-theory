<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;

class CreateChordAction
{
    public function execute(array $data): Chord
    {
        return Chord::create($data);
    }
}
