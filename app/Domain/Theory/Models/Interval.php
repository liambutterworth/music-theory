<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\IntervalBuilder;
use App\Domain\Theory\Collections\IntervalCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Interval extends Model
{
    protected $guarded = [];

    public function newEloquentBuilder($query): IntervalBuilder
    {
        return new IntervalBuilder($query);
    }

    public function newCollection(array $intervals = []): IntervalCollection
    {
        return new IntervalCollection($intervals);
    }

    public function chords(): BelongsToMany
    {
        return $this->belongsToMany(Chord::class, 'chord_degrees');
    }

    public function scales(): BelongsToMany
    {
        return $this->belongsToMany(Scale::class, 'scale_degrees');
    }
}
