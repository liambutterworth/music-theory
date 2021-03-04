<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\IntervalBuilder;
use App\Domain\Theory\Collections\IntervalCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Interval extends Model
{
    protected $guarded = [
        'id',
    ];

    public function newEloquentBuilder($query): IntervalBuilder
    {
        return new IntervalBuilder($query);
    }

    public function newCollection(array $intervals = []): IntervalCollection
    {
        return new IntervalCollection($intervals);
    }
}
