<?php

namespace App\Domain\Theory\Collections;

use Illuminate\Support\Collection;

class NoteCollection extends Collection
{
    public static function fromIntervals(
        string $root,
        IntervalCollection $intervals,
    ): self {
        return (new static)->sortByRoot($root)->filterByIntervals($intervals);
    }

    public function sortByRoot(string $root): self
    {
        return $this;
    }

    public function filterByIntervals(IntervalCollection $intervals): self
    {
        return $this;
    }
}
