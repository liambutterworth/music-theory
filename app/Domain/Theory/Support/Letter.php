<?php

namespace App\Domain\Theory\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Letter
{
    protected Collection $letters;
    protected int $index;

    public function __construct(string $name) {
        $this->letters = new Collection([ 'A', 'B', 'C', 'D', 'E', 'F', 'G' ]);
        $this->letter = Str::match('/[A-G]/', $name);
        $this->index = $this->letters->search($this->letter);
    }

    protected function incrementIndex(): void
    {
        if ($this->index === $this->letters->keys()->last()) {
            $this->index = 0;
        } else {
            $this->index++;
        }
    }

    protected function decrementIndex(): void
    {
        if ($this->index === 0) {
            $this->index = $this->letters->keys()->last();
        } else {
            $this->index--;
        }
    }

    public function raise(int $times = 1): self
    {
        for ($index = 0; $index < $times; $index++) {
            $this->incrementIndex();
        }

        $this->letter = $this->letters->get($this->index);

        return $this;
    }

    public function lower(int $times = 1): self
    {
        for ($index = 0; $index < $times; $index++) {
            $this->decrementIndex();
        }

        $this->letter = $this->letters->get($this->index);

        return $this;
    }

    public function __toString(): string
    {
        return $this->letter;
    }
}
