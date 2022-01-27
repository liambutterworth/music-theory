<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Models\Interval;
use Illuminate\Support\Collection;

class Key
{
    protected Collection $notes;

    public function __construct(
        protected Note $root,
    ) {
        $notes = $root->prefersFlats() ? Note::preferFlats() : Note::preferSharps();
        $intervals = Interval::fromFormula('1-2-3-4-5-6-7')->get();

        dd($notes->toArray(), $intervals->pluck('steps')->toArray());

        // $this->notes = $notes->filter()
    }

    public static function root(string $root): self
    {
        return new static($root instanceof Note ? $root : new Note($root));

//         $root = $name instanceof Note ? $name : new Note($name);

//         $notes = Note::prefersFlats($name) ? Note::preferFlats() : Note::preferSharps();

//         $intervals = Interval::fromFormula('1-2-3-4-5-6-7');

//         $notes->transform(function($interval) use($notes) {
//             return $notes->get($interval->steps);
//         })->pipeInto(static::class);

        // return new static(
        //     root: $root instanceof Note ? $root : Note::name($root),
        //     notes: NoteCollection::fromFormula($root, '1-2-3-3-4-5-6-7'),
        // );
    }

    public static function rootPrefersSharps()
    {
        
    }
}
