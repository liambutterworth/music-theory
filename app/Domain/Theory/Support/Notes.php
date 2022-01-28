<?php

namespace App\Domain\Theory\Support;

use Illuminate\Support\Collection;

class Notes
{
    protected Collection $collection;

    public function __construct(Collection|array $notes = [])
    {
        $this->collection = is_array($notes) ? new Collection($notes) : $notes;
    }

    public static function __callStatic(string $method, array $arguments)
    {
        return static::all()->$method(...$arguments);
    }

    public static function all(): self
    {
        return new static(Dictionary::get('notes'));
    }

    public function naturals(): self
    {
        $this->collection = $this->collection->filter(function($note) {
            return $note->isNatural();
        })->values();

        return $this;
    }

    // public static function accidentals(): Collection
    // {
    //     return new static(
    //         Dictionary::collect('notes')->filter(function($note) {
    //             return $note->isAccidental();
    //         })->values()
    //     );
    // }

    // public static function flats(): Collection
    // {
    //     return new static(
    //         Dictionary::collect('notes')->filter(function($note) {
    //             return $note->isFlat();
    //         })->values()
    //     );
    // }

    // public static function sharps(): Collection
    // {
    //     return new static(
    //         Dictionary::collect('notes')->filter(function($note) {
    //             return $note->isSharp();
    //         })->values()
    //     );
    // }

    // public static function preferFlats(): Collection
    // {
    //     return (new static)->filter(function($note) {
    //         return $note->isNatural() || $note->isFlat();
    //     })->values();
    // }

    // public static function preferSharps(): Collection
    // {
    //     return (new static)->filter(function($note) {
    //         return $note->isNatural() || $note->isSharp();
    //     })->values();
    // }
}
