<?php

namespace App\Domain\Theory\Collections;

use Illuminate\Database\Eloquent\Collection;

class NoteCollection extends Collection
{
    public function key(string $root): self
    {
        // TODO sort by alphabetical order starting with root name and wrap around
    }
}
