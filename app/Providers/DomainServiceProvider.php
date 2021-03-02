<?php

namespace App\Providers;

use App\Contracts\Services as Contracts;
use App\Domain\Theory\Services as Theory;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public $bindings = [
        Contracts\ChordService::class => Theory\ChordService::class,
        Contracts\IntervalService::class => Theory\IntervalService::class,
        Contracts\NoteService::class => Theory\NoteService::class,
        Contracts\ScaleService::class => Theory\ScaleService::class,
    ];
}
