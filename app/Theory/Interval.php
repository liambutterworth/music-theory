<?php

namespace App\Theory;

use App\Theory\Collections\IntervalCollection;
use App\Theory\Concerns\HasAttributes;
use App\Theory\Exceptions\InvalidIntervalException;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Interval
{
    use HasAttributes;

    public function __construct(array $attributes) {
        $this->setAttributes($attributes);
    }

    public function __get(string $key): mixed
    {
        return $this->getAttribute($key);
    }

    public static function all(): IntervalCollection
    {
        return new IntervalCollection(Dictionary::get('intervals'));
    }

    public static function name(string $name): self
    {
        $attributes = static::all()->firstWhere('name', Str::lower($name));

        if (is_null($attributes)) {
            throw new InvalidIntervalException("Interval with name '$name' not found");
        }

        return new static($attributes);
    }

    public static function abbr(string $abbr)
    {
        $attributes = static::all()->firstWhere('abbr', Str::lower($abbr));

        if (is_null($attributes)) {
            throw new InvalidIntervalException("Interval with abbr '$abbr' not found");
        }

        return new static($attributes);
    }

    public static function degree(string $degree)
    {
        $attributes = static::all()->firstWhere('degree', $degree);

        if (is_null($attributes)) {
            throw new InvalidIntervalException("Interval with degree '$degree' not found");
        }

        return new static($attributes);
    }

    public static function formula(string $formula): Collection
    {
        return Dictionary::collect('intervals')
            ->whereIn('degree', Str::of($formula)->explode('-'))
            ->mapInto(static::class);
    }

    public static function measure(Note|string $from, Note|string $to): Interval
    {
        $ruler = Dictionary::collect('notes.ruler');

        $fromIndex = $ruler->search(function ($name) use ($from) {
            return is_array($name) ? Arr::contains($name, $from) : $name === $from;
        });

        // TODO finsh this method

        dd($ruler->toArray(), $ruler->search(Note::resolve($from)), $ruler->search(Note::resolve($to)));
    }
}
