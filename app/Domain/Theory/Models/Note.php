<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\NoteBuilder;
use App\Domain\Theory\Collections\NoteCollection;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    const FLAT = 'flat';
    const SHARP = 'sharp';
    const FLAT_SIGN = 'b';
    const SHARP_SIGN = '#';
    const DOUBLE_SHARP_SIGN = 'x';
    const TWO_SHARP_SIGNS = '##';
    const IS_VALID_REGEX = '/^[A-G](?:b+|#+|x)?$/';
    const IS_REAL_REGEX = '/^[ABDEG]b$|^[ACDFG]#$|^[A-G]$/';
    const IS_THEORETICAL_REGEX = '//';
    const IS_NATURAL_REGEX = '/^[A-G]$/';
    const IS_ACCIDENTAL_REGEX = '/^[A-G][b#x]+$/';
    const IS_FLAT_REGEX = '/b+/';
    const IS_SHARP_REGEX = '/#+/';
    const MATCH_REAL_REGEX = '/[ABDEG]b|[ACDFG]#|[A-G](?=x)?/';
    const MATCH_LETTER_REGEX = '/[A-B]/';
    const MATCH_SIGNS_REGEX = '/([b#x])/';
    const PREFERS_FLATS_REGEX = '/^[F]$|^[A-G]b+$/';
    const PREFERS_SHARPS_REGEX = '/^[ABCDE]$|^[A-G]#+$/';

    const REAL_NAMES = [
        'A',
        'A#', 'Bb',
        'B',
        'C',
        'C#', 'Db',
        'D',
        'D#', 'Eb',
        'E',
        'F',
        'F#', 'Gb',
        'G',
        'G#', 'Ab',
    ];

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
}
