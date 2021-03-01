<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'api',
], function() {

    //
    // Intervals
    //

    Route::apiResource('intervals', 'IntervalController');

    //
    // Chords
    //

    Route::get('chords/{chord}/intervals', 'ChordController@intervals')->name('chord.intervals');
    Route::get('chords/{chord}/notes/{root}', 'ChordController@notes')->name('chord.notes');
    Route::apiResource('chords', 'ChordController');

    //
    // Scales
    //

    Route::get('scales/{scale}/intervals', 'ChordController@intervals')->name('scale.intervals');
    Route::get('scales/{scale}/notes/{root}', 'ChordController@notes')->name('scale.notes');
    Route::apiResource('scales', 'ScaleController');

    //
    // Notes
    //

    Route::get('notes/{note}/key', 'NoteController@key')->name('notes.key');
    Route::apiResource('notes', 'NoteController');
});
