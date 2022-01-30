<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Interval;
use App\Domain\Theory\Models\Note;
use App\Support\Action;

class MeasureNotes extends Action
{
    public function handle(Note $from, Note $to): Interval
    {
        dd($from, $to);
    }
}
