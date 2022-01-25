<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\ChordBuilder;
use App\Domain\Theory\Collections\ChordCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Chord extends Model
{
    public function newEloquentBuilder($query): ChordBuilder
    {
        return new ChordBuilder($query);
    }

    public function newCollection(array $models = []): ChordCollection
    {
        return new ChordCollection($models);
    }

    public function intervals(): MorphToMany
    {
        return $this->morphToMany(
            Interval::class,
            'degreeable',
            'degrees',
        )->using(Degree::class);
    }

    public function degrees(): MorphMany
    {
        return $this->morphMany(Degree::class, 'degreeable');
    }
}
