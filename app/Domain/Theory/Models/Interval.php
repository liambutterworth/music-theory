<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\IntervalBuilder;
use App\Domain\Theory\Collections\IntervalCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Interval extends Model
{
    public function newEloquentBuilder($query): IntervalBuilder
    {
        return new IntervalBuilder($query);
    }

    public function newCollection(array $models = [])
    {
        return new IntervalCollection($models);
    }

    public function chords(): MorphToMany
    {
        return $this->morphedByMany(Chord::class, 'degreeable')->using(Degree::class);
    }

    public function scales(): MorphToMany
    {
        return $this->morphedByMany(Scale::class, 'degreeable')->using(Degree::class);
    }
}
