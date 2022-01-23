<?php

namespace App\Domain\Theory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Scale extends Model
{
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
