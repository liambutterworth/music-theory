<?php

namespace App\Domain\Theory\Actions;

use App\Support\Action;
use App\Domain\Theory\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;

class ResolveNote extends Action
{
    private Note $note;
    private Stringable $name;
    private Collection $names;

    public function handle(string $name): Note
    {
        $this->note = new Note;
        $this->name = Str::of($name);

        $this->names = Collection::wrap(Note::REAL_NAMES)->when(
            $this->name->test(Note::PREFERS_FLATS_REGEX),

            function($names) {
                return $names->filter(function ($name) {
                    return !Str::contains($name, Note::SHARP_SIGN);
                });
            },

            function ($names) {
                return $names->filter(function ($name) {
                    return !Str::contains($name, Note::FLAT_SIGN);
                });
            }
        )->values();

        $this->note->name = $name;
        $this->note->real_name = $this->resolve();
        $this->note->is_real = $this->name->test(Note::IS_REAL_REGEX);
        $this->note->is_theoretical = !$this->name->test(Note::IS_THEORETICAL_REGEX);
        $this->note->is_natural = $this->name->test(Note::IS_NATURAL_REGEX);
        $this->note->is_accidental = $this->name->test(Note::IS_ACCIDENTAL_REGEX);
        $this->note->is_flat = $this->name->test(Note::IS_FLAT_REGEX);
        $this->note->is_sharp = $this->name->test(Note::IS_SHARP_REGEX);
        $this->note->prefers_flats = $this->name->test(Note::PREFERS_FLATS_REGEX);
        $this->note->prefers_sharps = $this->name->test(Note::PREFERS_SHARPS_REGEX);
        $this->note->lowers_to = $this->lower();
        $this->note->raises_to = $this->raise();
        $this->note->increments_to = $this->increment();
        $this->note->decrements_to = $this->decrement();

        dd($this->note->toArray());
    }

    private function resolve(): string
    {
        $formatted = $this->name->replace(Note::DOUBLE_SHARP_SIGN, Note::TWO_SHARP_SIGNS);
        $start = $formatted->match(Note::MATCH_REAL_REGEX);
        $steps = $formatted->after($start)->matchAll('/([b#x])/')->count();
        $index = $this->names->search($start);

        if ($this->name->test(Note::PREFERS_FLATS_REGEX)) {
            $index -= $steps;
        } else {
            $index += $steps;
        }

        return $this->names->slice($index % $this->names->count(), 1)->first();
    }

    private function lower(): string
    {
        dd('lower', $this->name);
        return $this->name; // TODO
    }

    private function raise(): string
    {
        return $this->name; // TODO
    }

    private function decrement(): string
    {
        return $this->name; // TODO
    }

    private function increment(): string
    {
        return $this->name; // TODO
    }
}
