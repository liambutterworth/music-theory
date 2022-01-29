<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\NoteBuilder;
use App\Domain\Theory\Collections\NoteCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Note extends Model
{
    protected string $theoretical_name;

    public $fillable = [
        'name',
    ];

    public function newEloquentBuilder($query): NoteBuilder
    {
        return new NoteBuilder($query);
    }

    public function newCollection(array $models = []): NoteCollection
    {
        return new NoteCollection($models, 'name');
    }

    public function getIsNaturalAttribute(): bool
    {
        return !Str::contains($this->name, ['b', '#']);
    }

    public function getIsAccidentalAttribute(): bool
    {
        return Str::contains($this->name, ['b', '#']);
    }

    public function getIsFlatAttribute(): bool
    {
        return Str::contains($this->name, 'b');
    }

    public function getIsSharpAttribute(): bool
    {
        return Str::contains($this->name, '#');
    }

    public function getPrefersFlatsAttribute(): bool
    {
        return Str::contains($this->name, 'b') || $this->name === 'F';
    }

    public function getPrefersSharpsAttribute(): bool
    {
        return Str::contains($this->name, '#') || $this->name !== 'F';
    }

    public function getTheoreticalNameAttribute(): ?string
    {
        return Arr::get($this->attributes, 'theoretical_name');
    }

    public function getRealNameAttribute(): string
    {
        return Arr::get($this->attributes, 'name');
    }

    public function getNameAttribute()
    {
        return $this->theoretical_name ?? $this->real_name;
        // return Arr::has($this->attributes, 'theoretical_name')
        // ? Arr::get($this->attributes, 'theoretical_name')
        // : Arr::get($this->attributes)
    }
}
