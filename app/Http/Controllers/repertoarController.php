<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class repertoarController extends Controller
{
    public function getRepertoar() {
        return view('repertoar');
    }
}
