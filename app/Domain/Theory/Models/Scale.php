<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\ScaleBuilder;
use App\Domain\Theory\Collections\ScaleCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Scale extends Model
{
    public function newEloquentBuilder($query): ScaleBuilder
    {
        return new ScaleBuilder($query);
    }

    public function newCollection(array $models = []): ScaleCollection
    {
        return new ScaleCollection($models);
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
