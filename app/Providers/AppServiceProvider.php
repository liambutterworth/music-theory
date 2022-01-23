<?php

namespace App\Providers;

use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Scale;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'chord' => Chord::class,
            'scale' => Scale::class,
        ]);
    }
}
