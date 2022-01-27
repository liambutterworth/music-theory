<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Models\Interval;
use ArrayAccess;
use Illuminate\Support\Str;

class Note implements ArrayAccess
{
    const LIST = [
        'A', 'A#', 'Bb',
        'B',
        'C', 'C#', 'Db',
        'D', 'D#', 'Eb',
        'E',
        'F', 'F#', 'Gb',
        'G', 'G#', 'Ab',
    ];

    public function __construct(
        protected string $name
    ) {}

    public function __get(string $property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function offsetExists($offset): bool
    {
        return property_exists($this, $offset);
    }

    public function offsetGet($offset): mixed
    {
        return $this->$offset;
    }

    public function offsetSet($offset, $value): void
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->$offset);
    }

    public static function all(): Notes
    {
        return Notes::wrap(static::LIST);
    }

    public static function flats(): Notes
    {
        return static::all()->filter(function($note) {
            return $note->isFlat();
        });
    }

    public static function sharps(): Notes
    {
        return static::all()->filter(function($note) {
            return $note->isSharp();
        });
    }

    public static function preferFlats(): Notes
    {
        return static::all()->filter(function($note) {
            return $note->isNatural() || $note->isFlat();
        });
    }

    public static function preferSharps(): Notes
    {
        return static::all()->filter(function($note) {
            return !Str::contains($note->name, 'b');
        });
    }

    public static function fromFormula(Note|string $root, string $formula): Notes
    {
        $note = $root instanceof Note ? $root : new Note($root);
        $chromatic = $note->prefersFlats() ? Note::preferFlats() : Note::preferSharps();

        dd($chromatic->pluck('name')->toArray(), Interval::fromFormula($formula)->pluck('abbr', 'steps')->toArray());
        return $chromatic->intersectByKeys(Interval::fromFormula($formula)->pluck('steps'));
    }

    public function validate(): bool
    {
        return true; // TODO add validation
    }

    public function isNatural(): bool
    {
        return !$this->isAccidental();
    }

    public function isAccidental(): bool
    {
        return Str::contains($this->name, ['b', '#']);
    }

    public function isSharp(): bool
    {
        return Str::contains($this->name, '#');
    }

    public function isFlat(): bool
    {
        return Str::contains($this->name, 'b');
    }

    public function prefersFlats(): bool
    {
        return Str::contains($this->name, 'b') || $this->name === 'F';
    }

    public function prefersSharps(): bool
    {
        return !$this->prefersFlats();
    }
}
