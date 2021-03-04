<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Interval;

class UpdateChordAction
{
    public function execute(int $id, array $data): Chord
    {
        Chord::where('id', $id)->update($data);
    }
}
