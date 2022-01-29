<?php

namespace App\Domain\Theory\Builders;

use App\Domain\Theory\Actions\ResolveNote;
use App\Domain\Theory\Models\Note;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class NoteBuilder extends Builder
{
    public function resolve(string $name): Note
    {
        return ResolveNote::execute($name);
    }

    public function all(...$arguments): self
    {
        return Cache::get('notes.all', function () use ($arguments) {
            return parent::all(...$arguments);
        });
    }

    public function naturals(): self
    {
        return $this->where('is_natural', true);
    }

    public function accidentals(): self
    {
        return $this->where('is_accidental', true);
    }

    public function flats(): self
    {
        return $this->where('is_flat', true);
    }

    public function sharps(): self
    {
        return $this->where('is_sharp', true);
    }

    public function preferFlats(): self
    {
        return $this->where('is_sharp', false);
    }

    public function preferSharps(): self
    {
        return $this->where('is_flat', false);
    }
}
