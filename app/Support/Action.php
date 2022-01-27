<?php

namespace App\Support;

use Illuminate\Support\Facades\App;

abstract class Action
{
    public static function execute(...$arguments)
    {
        return App::make(static::class)->handle(...$arguments);
    }
}
