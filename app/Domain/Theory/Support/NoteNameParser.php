<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Models\Note;
use Illuminate\Support\Stringable;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class NoteNameParser
{
    protected Collection $names;
    protected Stringable $name;
    protected Stringable $reference;
    protected Stringable $resolved;
    protected int $referenceIndex;
    protected int $resolvedIndex;
    protected int $offset;
    protected bool $valid;

    public function __construct(string $name)
    {
        $this->name = Str::of($name);
        $this->valid = $this->name->test(Note::IS_VALID_REGEX);

        if ($this->valid) {
            $this->names = Collection::wrap(Note::REAL_NAMES)->when(
                $this->name->test(Note::PREFERS_FLATS_REGEX),

                function($names) {
                    return $names->filter(function ($name) {
                        return !Str::contains($name, Note::SHARP_SIGN);
                    });
                },

                function ($names) {
                    return $names->filter(function ($name) {
                        return !Str::contains($name, Note::FLAT_SIGN);
                    });
                }
            )->values();

            $this->reference = $this->name->match(Note::MATCH_REAL_REGEX);
            $this->referenceIndex = $this->names->search($this->reference);

            $this->offset = $this->name->after($this->reference)->matchAll(
                Note::MATCH_SIGNS_REGEX
            )->reduce(function ($carry, $sign) {
                return match ($sign) {
                    'b' => $carry - 1,
                    '#' => $carry + 1,
                    'x' => $carry + 2,
                };
            });

            $this->resolvedIndex = $this->referenceIndex + $this->offset;
            $this->resolved = Str::of($this->names->get($this->resolvedIndex));
        }
    }

    public static function parse(...$arguments): self
    {
        return new static(...$arguments);
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function isReal(): bool
    {
        return $this->name->test(Note::IS_REAL_REGEX);
    }

    public function isTheoretical(): bool
    {
        return $this->name->test(Note::IS_THEORETICAL_REGEX);
    }

    public function isNatural(): bool
    {
        return $this->name->test(Note::IS_NATURAL_REGEX);
    }

    public function isAccidental(): bool
    {
        return $this->name->test(Note::IS_ACCIDENTAL_REGEX);
    }

    public function isFlat(): bool
    {
        return $this->name->test(Note::IS_FLAT_REGEX);
    }

    public function isSharp(): bool
    {
        return $this->name->test(Note::IS_SHARP_REGEX);
    }

    public function prefersFlats(): bool
    {
        return $this->name->test(Note::PREFERS_FLATS_REGEX);
    }

    public function prefersSharps(): bool
    {
        return $this->name->test(Note::PREFERS_SHARPS_REGEX);
    }

    public function resolve(): ?string
    {
        return $this->resolved ?? null;
    }

    public function lower(): string
    {
        // TODO
    }

    public function raise(): string
    {
        // TODO
    }

    public function decrement(): string
    {
        // TODO
    }

    public function increment(): string
    {
        // TODO
    }
}
