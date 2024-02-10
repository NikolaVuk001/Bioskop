<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Multi_Slike;
use Carbon\Carbon;


class IndexController extends Controller
{

    public function index(){
        return view("home");
    }

    public function FilmDetails($id){
        $film = Film::where("id",$id)->first();
        $slike = Multi_Slike::where("film_id", $id)->get();
        return view('movie', compact('film','slike'));

    }
    //

    public function SviFilmoviUPonudi(){
        $films = Film::where("trenutno_aktivan", 1)->get();
        $uskoro = 0;
        return view('allFilmovi', compact('films','uskoro'));
    }
    public function SviFilmoviUskoro(){        
        $date = Carbon::today();        
        $films = Film::where('pocetak_prikazivanja_date', '>', $date)->get();
        $uskoro = 1;
        return view('allFilmovi',compact('films', 'uskoro'));
    }
    public function SviFilmoviZanr($zanr){
        $films = Film::where("zanr", 'LIKE', '%' . $zanr .'%')->get();
        $uskoro = 0;
        return view('allFilmovi',compact('films','uskoro'));
    }
}
