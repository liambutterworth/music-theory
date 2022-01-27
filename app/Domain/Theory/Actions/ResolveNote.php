<?php

namespace App\Domain\Theory\Actions;

use App\Domain\Theory\Models\Note;
use App\Domain\Theory\Support\Letter;
use App\Support\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ResolveNote extends Action
{
    private Collection $names;

    public function __construct(private Request $request)
    {
        $this->names = new Collection([
            'A',
            ['A#', 'Bb'],
            'B',
            'C',
            ['C#', 'Db'],
            'D',
            ['D#', 'Eb'],
            'E',
            'F',
            ['F#', 'Gb'],
            'G',
            ['G#', 'Ab'],
        ]);
    }

    public function handle(string $note): string
    {
        return $this->test();
        dd($this->names->flatten());

        // $notes = Note::all();

        // if ($notes->contains('name', $name)) {
        //     return $notes->firstWhere('name', $name);
        // }

        $letter = new Letter($name);
        $signs = Str::matchAll('/#|b/', $name);
        $isSharp = $signs->contains('#');
        $isFlat = !$isSharp;
        $hasOneSign = $signs->count() === 1;
        $hasMultipleSigns = !$hasOneSign;

        if ($isSharp && $hasOneSign) {
            return Note::name($letter->raise());
        } else if ($isSharp && $hasMultipleSigns) {
            dd($notes->get($notes->search($letter . $signs->shift()) + $signs->keys()->last()));
            // dd($letter . $signs->shift(), 'raise ' . $signs->count() . ' times');
            // dd('multiple', (string) $letter->raise(2));
            return Note::name($letter->raise(2));
        }

        dd($letter);
    }

    private function foo(): string
    {
        return 'called foo';
    }

    protected function test()
    {
        return 'test failed';
    }
}
