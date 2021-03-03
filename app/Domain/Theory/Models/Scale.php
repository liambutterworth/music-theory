<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\ScaleBuilder;
use App\Domain\Theory\Collections\ScaleCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Scale extends Model
{
    protected $guarded = [
        'id',
    ];

    public function newEloquentBuilder($query): ScaleBuilder
    {
        return new ScaleBuilder($query);
    }

    public function newCollection(array $scales = []): ScaleCollection
    {
        return new ScaleCollection($scales);
    }

    public function intervals(): BelongsToMany
    {
        return $this->belongsToMany(Interval::class, 'scale_degrees');
    }
}
