<?php

namespace App\Domain\Theory\Services;

use App\Domain\Theory\Collections\IntervalColletion;
use App\Domain\Theory\Collections\ScaleCollection;
use App\Domain\Theory\Collections\ChordColletion;
use App\Domain\Theory\Collections\NoteColletion;

class KeyService
{
    protected IntervalService $interval;
    protected ChordService $chord;
    protected ScaleService $scale;
    protected NoteService $note;

    public function __construct(
        IntervalService $interval,
        ChordService $chord,
        ScaleService $scale,
        NoteService $note
    ) {
        $this->interval = $interval;
        $this->chord = $chord;
        $this->scale = $scale;
        $this->note = $note;
    }

    public function notes(string $root): NoteCollection
    {
        $rootNote = $this->note->findByName($root);
    }
}
