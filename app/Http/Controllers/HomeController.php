<?php

namespace App\Http\Controllers;

use App\Domain\Theory\Models\Interval;
use App\Domain\Theory\Models\Chord;
use App\Domain\Theory\Models\Note;
use App\Domain\Theory\Models\Scale;
use Illuminate\Support\Facades\View;

class HomeController
{
    public function __invoke()
    {
        $theory = [
            'intervals' => Interval::all()->toArray(),
            'chords' => Chord::all()->toArray(),
            'notes' => Note::all()->toArray(),
            'scales' => Scale::all()->toArray(),
        ];

        return View::make('home')->with(compact('theory'));
    }
}
