<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Exceptions\InvalidNoteException;
use App\Support\Action;
use App\Domain\Theory\Models\Note;
use App\Domain\Theory\Support\NoteNameParser;

class ResolveNote extends Action
{
    public function handle(string $name): Note
    {
        return Note::whereName($name)->firstOr(function () use ($name) {
            $parser = NoteNameParser::parse($name);

            if (!$parser->isValid()) {
                throw new InvalidNoteException("Note '$name' is invalid");
            }

            $note = new Note;

            $this->note->name = $name;
            $this->note->real_name = $parser->resolve();
            $this->note->is_real = $parser->isReal();
            $this->note->is_theoretical = $parser->isTheoretical();
            $this->note->is_natural = $parser->isNatural();
            $this->note->is_accidental = $parser->isAccidental();
            $this->note->is_flat = $parser->isFlat();
            $this->note->is_sharp = $parser->isSharp();
            $this->note->prefers_flats = $parser->prefersFlats();
            $this->note->prefers_sharps = $parser->prefersSharps();
            $this->note->lowers_to = $parser->lower();
            $this->note->raises_to = $parser->raise();
            $this->note->decrements_to = $parser->decrement();
            $this->note->increments_to = $parser->increment();

            dd($this->note->toArray());

            $note->save();

            return $note;
        });
    }
}
