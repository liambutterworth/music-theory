<?php

namespace App\Domain\Theory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Interval extends Model
{
    public function chords(): MorphToMany
    {
        return $this->morphedByMany(Chord::class, 'degreeable')->using(Degree::class);
    }

    public function scales(): MorphToMany
    {
        return $this->morphedByMany(Scale::class, 'degreeable')->using(Degree::class);
    }
}
