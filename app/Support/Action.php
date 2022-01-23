<?php

namespace App\Support;

use Illuminate\Support\Facades\App;

abstract class Action
{
    public static function make(): self
    {
        return App::make(static::class);
    }
}
