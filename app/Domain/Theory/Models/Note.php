<?php

namespace App\Domain\Theory\Models;

use App\Domain\Theory\Builders\NoteBuilder;
use App\Domain\Theory\Collections\NoteCollection;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public $fillable = [
        'name',
    ];

    public function newEloquentBuilder($query): NoteBuilder
    {
        return new NoteBuilder($query);
    }

    public function newCollection(array $models = []): NoteCollection
    {
        return new NoteCollection($models);
    }

}
