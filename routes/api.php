<?php

use App\Http\Controllers\Api\Chords;
use App\Http\Controllers\Api\Intervals;
use App\Http\Controllers\Api\Notes;
use App\Http\Controllers\Api\Scales;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function() {

    //
    // Chords
    //

    Route::get('chords', Chords\ListChordsController::class);
    Route::get('chords/{chord}', Chords\FindChordController::class);
    Route::post('chords', Chords\CreateChordController::class);
    Route::put('chords/{chord}', Chords\CreateChordController::class);

    //
    // Intervals
    //

    Route::get('intervals', Intervals\ListIntervalsController::class);
    Route::get('intervals/{interval}', Intervals\FindIntervalController::class);

    //
    // Notes
    //

    Route::get('notes', Notes\ListnotesController::class);
    Route::get('notes/{note}', Notes\FindnoteController::class);

    //
    // Scales
    //

    Route::get('scales', Scales\ListScalesController::class);
    Route::get('scales/{scale}', Scales\FindScaleController::class);
    Route::post('scales', Scales\CreateScaleController::class);
    Route::put('scales/{chord}', Scales\UpdateScaleController::class);
});
