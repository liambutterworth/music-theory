<?php

namespace App\Theory;

use App\Theory\Collections\NoteCollection;
use App\Theory\Concerns\HasAttributes;
use App\Theory\Exceptions\InvalidNoteException;
use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use JsonSerializable;

class Note implements Arrayable, ArrayAccess, JsonSerializable
{
    use HasAttributes;

    const FLAT = 'flat';
    const SHARP = 'sharp';

    public function __construct(string $name)
    {
        $this->setAttributes([
            'name' => static::validate($name),
            'real' => static::resolve($name),
        ]);
    }

    public function __get(string $key): mixed
    {
        return $this->getAttribute($key);
    }

    public static function validate(string $name): string
    {
        if (Str::of($name)->match('/^[A-G](?:b+|#+|x)?$/')->isEmpty()) {
            throw new InvalidNoteException("Note '$name' is invalid");
        }

        return $name;
    }

    public static function resolve(string $name): string
    {
        if (Dictionary::contains('notes.all', $name)) {
            return $name;
        }

        return Dictionary::resolve("synonyms.$name", function () use ($name) {
            $string = Str::of($name)->replace('x', '##');
            $start = $string->match('/[A-G](?:[b#](?=#))?/');
            $steps = $string->after($start)->matchAll('/([b#])/')->count();
            $prefers = Str::contains($name, 'b') ? static::FLAT : static::SHARP;

            $names = Dictionary::collect(match ($prefers) {
                static::FLAT  => 'notes.flats',
                static::SHARP => 'notes.sharps',
            });

            $index = $names->search($start);

            if ($prefers === static::FLAT) {
                $index -= $steps;
            } else {
                $index += $steps;
            }

            return $names->slice($index, 1)->first();
        });
    }

    public static function name(string $name): self
    {
        return new Note(static::validate($name), static::resolve($name));
    }

    public static function all(): NoteCollection
    {
        return new NoteCollection(Dictionary::lookup('notes.all'));
    }

    public static function flats(): NoteCollection
    {
        return new NoteCollection(Dictionary::lookup('notes.flats'));
    }

    public static function sharps(): NoteCollection
    {
        return new NoteCollection(Dictionary::lookup('notes.sharps'));
    }

    public function isReal(): bool
    {
        return $this->name === $this->real;
    }

    public function isNatural(): bool
    {
        return !Str::contains($this->name, ['b', '#']);
    }

    public function isAccidental(): bool
    {
        return Str::contains($this->name, ['b', '#']);
    }

    public function isFlat(): bool
    {
        return Str::contains($this->name, 'b');
    }

    public function isSharp(): bool
    {
        return Str::contains($this->name, '#');
    }

    public function prefersFlat(): bool
    {
        return $this->isFlat() || $this->name === 'F';
    }

    public function prefersSharp(): bool
    {
        return $this->isSharp() || $this->name !== 'F';
    }

    public function lower(): Note
    {
        $letter = Str::match('/[A-G]/', $this->name);
        $names = Dictionary::collect('notes.flats');

        dd($letter);

        // $names = $this->all()->flatMap(function($names) {
        // });

        // $names = Dictionary::collect('notes')->filter(function($name) {

        // });

        // $index = $names->
    }

    public function raise(): Note
    {
    }

    // public function prefers(): string
    // {
    //     return $this->prefersFlat() ? static::FLAT : static::SHARP;
    // }

    // public function flip(?string $to = null): Note
    // {
    //     return match ($to ?? $this->prefers()) {
    //         static::FLAT  => $this->flipToFlat(),
    //         static::SHARP => $this->flipToSharp(),
    //     };
    // }

    // public function flipToSharp(): Note
    // {

    //     return $this;
    // }

    // public function flipToFlat(): Note
    // {

    //     return $this;
    // }
}

