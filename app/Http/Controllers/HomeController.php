<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class HomeController
{
    public function __invoke()
    {
        return View::make('home');
    }
}
