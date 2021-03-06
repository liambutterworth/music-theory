<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\ChordBuilder;
use App\Domain\Theory\Collections\ChordCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chord extends Model
{
    protected $guarded = [
        'id',
    ];

    public function newEloquentBuilder($query): ChordBuilder
    {
        return new ChordBuilder($query);
    }

    public function newCollection(array $chords = []): ChordCollection
    {
        return new ChordCollection($chords);
    }
}
