<?php

namespace App\Domain\Theory\Support;

use Illuminate\Support\Collection;

class Notes extends Collection
{
    public function __construct(array $items = [])
    {
        parent::__construct($items);

        $this->transform(function($name) {
            return $name instanceof Note ? $name : new Note($name);
        });
    }

    public function validate(): self
    {
        $this->each->validate();

        return $this;
    }

    public function naturals(): self
    {
        return $this->filter(function($note) {
            $note->isNatural();
        });
    }

    public function preferFlats(): self
    {
        return $this->filter(function($note) {
        });
    }

    // public static function list(): self
    // {
    //     return Note::all()->pipeInto(static::class);
    // }

    // public static function naturals(): self
    // {
    //     return static::list()->filter(function($name) {
    //         return !Str::contains($name, ['b', '#']);
    //     });
    // }

    // public static function flats(): self
    // {
    //     return static::list()->filter(function($name) {
    //         return Str::contains($name, 'b');
    //     });
    // }

    // public static function sharps(): self
    // {
    //     return static::list()->filter(function($name) {
    //         return Str::contains($name, '#');
    //     });
    // }

    // public static function preferFlats(): self
    // {
    //     return static::list()->filter(function($name) {
    //         return !Str::contains($name, '#');
    //     });
    // }

    // public static function preferSharps(): self
    // {
    //     return static::list()->filter(function($name) {
    //         return !Str::contains($name, 'b');
    //     });
    // }
}
