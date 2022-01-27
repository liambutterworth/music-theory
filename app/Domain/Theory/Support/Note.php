<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Support\Concerns\HasAttributes;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Note
{
    use HasAttributes;

    const LIST = [
        'A', 'A#', 'Bb',
        'B',
        'C', 'C#', 'Db',
        'D', 'D#', 'Eb',
        'E',
        'F', 'F#', 'Gb',
        'G', 'G#', 'Ab',
    ];

    protected string $real;

    public function __construct(string $name)
    {
        $this->setAttribute('name', $this->validate($name));
        $this->setAttribute('real', $this->resolve($name));
    }

    public function __get(string $key): mixed
    {
        return $this->getAttribute($key);
    }

    public function __set(string $key, mixed $value): void
    {
        $this->setAttribute($key, $value);
    }

    public static function all(): Collection
    {
        return new Collection(static::LIST);
    }

    public static function naturals(): Collection
    {
        return static::all()->filter(function($note) {
            return !Str::contains($note, ['b', '#']);
        })->values();
    }

    public static function accidentals(): Collection
    {
        return static::all()->filter(function($note) {
            return Str::contains($note, ['b', '#']);
        })->values();
    }

    public static function flats(): Collection
    {
        return static::all()->filter(function($note) {
            return Str::contains($note, 'b');
        })->values();
    }

    public static function sharps(): Collection
    {
        return static::all()->filter(function($note) {
            return Str::contains($note, '#');
        });
    }

    public static function preferFlats(): Collection
    {
        return static::all()->filter(function($note) {
            return !Str::contains($note, '#');
        })->values();
    }

    public static function preferSharps(): Collection
    {
        return static::all()->filter(function($note) {
            return !Str::contains($note, 'b');
        })->values();
    }

    public function validate(string $name): string
    {
        return $name; // TODO add validation
    }

    public function resolve(string $name): string
    {
        if (static::all()->contains($name)) {
            return $name;
        }

        $string = Str::of($name)->replace('x', '##');
        $start = $string->match('/[A-G](?:[b#](?=#))?/');
        $steps = $string->after($start)->matchAll('/([b#])/')->count();
        $notes = $string->contains('b') ? static::preferFlats() : static::preferSharps();
        $index = $notes->search($start);

        if ($string->contains('#')) {
            $index += $steps;
        } else {
            $index -= $steps;
        }

        return $notes->slice($index, 1)->first();
    }
}

