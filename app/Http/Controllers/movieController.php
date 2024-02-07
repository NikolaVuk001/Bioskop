<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class movieController extends Controller
{
    public function getMovies() {
        return view('movie');
    }
}
