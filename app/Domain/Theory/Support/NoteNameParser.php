<?php

namespace App\Domain\Theory\Support;

use App\Domain\Theory\Exceptions\InvalidNoteException;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;

class NoteNameParser
{
    const FLAT = 'flat';
    const SHARP = 'sharp';
    const FLAT_SIGN = 'b';
    const SHARP_SIGN = '#';
    const IS_VALID_REGEX = '/^[A-G](?:b+|#+|x)?$/';
    const IS_REAL_REGEX = '/^[ABDEG]b$|^[ACDFG]#$|^[A-G]$/';
    const IS_THEORETICAL_REGEX = '//';
    const IS_NATURAL_REGEX = '/^[A-G]$/';
    const IS_ACCIDENTAL_REGEX = '/^[A-G][b#x]+$/';
    const IS_FLAT_REGEX = '/b+/';
    const IS_SHARP_REGEX = '/#+/';
    const MATCH_REAL_REGEX = '/[ABDEG]b|[ACDFG]#|[A-G](?=x)?/';
    const MATCH_LETTER_REGEX = '/[A-G]/';
    const MATCH_SIGN_REGEX = '/([b#x])/';
    const PREFERS_FLATS_REGEX = '/^[F]$|^[A-G]b+$/';
    const PREFERS_SHARPS_REGEX = '/^[ABCDE]$|^[A-G]#+$/';

    const REAL_NAMES = [
        'A',
        ['A#', 'Bb'],
        'B',
        'C',
        ['C#', 'Db'],
        'D',
        ['D#', 'Eb'],
        'E',
        'F',
        ['F#', 'Gb'],
        'G',
        ['G#', 'Ab'],
    ];

    protected Stringable $name;
    protected Stringable $letter;
    protected Collection $names;
    protected Collection $letters;
    protected Collection $preferredNames;
    protected int $letterIndex;
    protected int $nameIndex;

    public static function parse(string $name): self
    {
        $name = Str::of($name);

        if (!$name->test(static::IS_VALID_REGEX)) {
            throw new InvalidNoteException("Note '$name' is invalid");
        }

        $parser = new static;

        $parser->name = $name;
        $parser->letter = $name->match(static::MATCH_LETTER_REGEX);
        $parser->names = Collection::wrap(static::REAL_NAMES);

        $parser->preferredNames = $parser->names->flatten()->when(
            $name->test(static::PREFERS_FLATS_REGEX),

            function($names) {
                return $names->filter(function ($name) {
                    return !Str::contains($name, static::SHARP_SIGN);
                });
            },

            function ($names) {
                return $names->filter(function ($name) {
                    return !Str::contains($name, static::FLAT_SIGN);
                });
            }
        )->values();

        $parser->letters = $parser->preferredNames->filter(function ($name) {
            return !Str::contains($name, ['b', '#']);
        });

        $parser->letterIndex = $parser->letters->search($parser->letter);
        $parser->nameIndex = $parser->preferredNames->search($name);

        return $parser;
    }

    public function isReal(): bool
    {
        return $this->names->flatten()->contains($this->name);
    }

    public function isTheoretical(): bool
    {
        return !$this->isReal();
    }

    public function isNatural(): bool
    {
        return !$this->isAccidental();
    }

    public function isAccidental(): bool
    {
        return $this->name->contains(['b', '#']);
    }

    public function isFlat(): bool
    {
        return $this->name->contains('b');
    }

    public function isSharp(): bool
    {
        return $this->name->contains('#');
    }

    public function prefersFlats(): bool
    {
        return $this->isFlat() || $this->name->is('F');
    }

    public function prefersSharps(): bool
    {
        return !$this->prefersFlats();
    }

    public function resolve(): string
    {
        if (!isset($this->resolved)) {
            $reference = $this->name->match(static::MATCH_REAL_REGEX);
            $signs = $this->name->after($reference)->matchAll(static::MATCH_SIGN_REGEX);
            $index = $this->preferredNames->search($reference);
            $total = $this->preferredNames->count();

            $offset = $signs->reduce(function ($carry, $sign) {
                return match ($sign) {
                    'b' => $carry - 1,
                    '#' => $carry + 1,
                    'x' => $carry + 2,
                };
            });

            $this->resolved = $this->preferredNames->get(($this->nameIndex + $offset) % $total);
        }

        return $this->resolved;
    }

    public function lower(): string
    {
        if (!isset($this->lowered)) {


            $letterCount = $letters->count();
            $letter = $name->match(static::MATCH_LETTER_REGEX);
            $letterIndexInLetters = $letters->search($letter);
            $letterIndexInNames = $names->search($letter);
            $loweredLeterIndexInLetters = ($letterIndexInLetters - 1) % $letterCount;
            $loweredLetter = Str::of($letters->slice($loweredLeterIndexInLetters, 1)->first());
            $loweredLetterIndexInNames = $names->search($loweredLetter);
            $loweredLetterOffset = abs(($loweredLetterIndexInNames - $nameCount) - $letterIndexInNames) % $nameCount;
        }

        return $this->lowered;
    }

    // public static function parse(string $name): self
    // {
    //     return new static($name);

    //     $name = Str::of($name);
    //     $names = Collection::wrap(static::REAL_NAMES);

    //     if (!$name->test(static::IS_VALID_REGEX)) {
    //         throw new InvalidNoteException("Note '$name' is invalid");
    //     }

    //     // $names = Collection::wrap(static::REAL_NAMES)->when(
    //     //     $name->test(static::PREFERS_FLATS_REGEX),
    //     //     function($names) {
    //     //         return $names->filter(function ($name) {
    //     //             return !Str::contains($name, static::SHARP_SIGN);
    //     //         });
    //     //     },
    //     //     function ($names) {
    //     //         return $names->filter(function ($name) {
    //     //             return !Str::contains($name, static::FLAT_SIGN);
    //     //         });
    //     //     }
    //     // )->values();

    //     $nameCount = $names->count();
    //     $referenceName = $name->match(static::MATCH_REAL_REGEX);
    //     $referenceIndex = $names->search($referenceName);

    //     $referenceOffset = $name->after($referenceName)->matchAll(
    //         static::MATCH_SIGNS_REGEX
    //     )->reduce(function ($carry, $sign) {
    //         return match ($sign) {
    //             'b' => $carry - 1,
    //             '#' => $carry + 1,
    //             'x' => $carry + 2,
    //         };
    //     });

    //     $resolvedIndex = ($referenceIndex + $referenceOffset) % $nameCount;
    //     $resolvedName = Str::of($names->get($resolvedIndex));

    //     $letters = $names->filter(function ($name) {
    //         return !Str::contains($name, [static::FLAT_SIGN, static::SHARP_SIGN]);
    //     })->values();

    //     $letterCount = $letters->count();
    //     $letter = $name->match(static::MATCH_LETTER_REGEX);
    //     $letterIndexInLetters = $letters->search($letter);
    //     $letterIndexInNames = $names->search($letter);

    //     $raisedLetterIndexInLetters = ($letterIndexInLetters + 1) % $letterCount;
    //     $raisedLetter = Str::of($letters->slice($raisedLetterIndexInLetters, 1)->first());
    //     $raisedLetterIndexInNames = $names->search($raisedLetter);
    //     $raisedLetterOffset = (($raisedLetterIndexInNames + $nameCount) - $letterIndexInNames) % $nameCount;

    //     $loweredLeterIndexInLetters = ($letterIndexInLetters - 1) % $letterCount;
    //     $loweredLetter = Str::of($letters->slice($loweredLeterIndexInLetters, 1)->first());
    //     $loweredLetterIndexInNames = $names->search($loweredLetter);
    //     $loweredLetterOffset = abs(($loweredLetterIndexInNames - $nameCount) - $letterIndexInNames) % $nameCount;

    //     dd([
    //         'names' => $names,
    //         'name' => (string) $name,
    //         'reference.name' => (string) $referenceName,
    //         'reference.index' => $referenceIndex,
    //         'reference.offset' => $referenceOffset,
    //         'resolved.name' => (string) $resolvedName,
    //         'resolved.index' => $resolvedIndex,
    //         'letter' => (string) $letter,
    //         'letter.index-in-letters' => $letterIndexInLetters,
    //         'letter.index-in-names' => $letterIndexInNames,
    //         'raised.letter' => (string) $raisedLetter,
    //         'raised.letter.index-in-names' => $raisedLetterIndexInNames,
    //         'raised.letter.formula' => "((raisedLetterIndexInNames + nameCount) - letterIndexInNames) % nameCount",
    //         'raised.letter.offset' => "(($raisedLetterIndexInNames + $nameCount) - $letterIndexInNames) % $nameCount = $raisedLetterOffset",
    //         'lowered.letter' => (string) $loweredLetter,
    //         'lowered.letter.indexInNames' => $loweredLetterIndexInNames,
    //         'lowered.letter.formula' => "((loweredLetterIndexInNames - nameCount) - letterIndexInNames) % nameCount",
    //         'lowered.letter.offset' => "abs(($loweredLetterIndexInNames - $nameCount) - $letterIndexInNames) % $nameCount = $loweredLetterOffset",
    //     ]);
    // }
}
