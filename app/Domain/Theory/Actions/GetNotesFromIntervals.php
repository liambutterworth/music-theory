<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Support\Note;
use App\Domain\Theory\Collections\IntervalCollection;
use App\Domain\Theory\Collections\NoteCollection;
use App\Support\Action;

class GetNotesFromIntervals extends Action
{
    public function execute(
        public Note $root,
        public IntervalCollection $intervals,
    ): NoteCollection {
        //
    }
}
