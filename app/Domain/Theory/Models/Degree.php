<?php

namespace App\Domain\Theory\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Degree extends MorphPivot
{
    protected $table = 'degrees';

    public function interval(): BelongsTo
    {
        return $this->belongsTo(Interval::class);
    }

    public function degreeable(): MorphTo
    {
        return $this->morphTo();
    }
}
