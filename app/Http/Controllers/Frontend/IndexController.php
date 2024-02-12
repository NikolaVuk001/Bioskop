<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Karta;
use App\Models\Projekcija;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Multi_Slike;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsEmpty;




class IndexController extends Controller
{

    public function index()
    {
        return view("home");
    }

    public function FilmDetails($id)
    {
        $film = Film::where("id", $id)->first();
        $slike = Multi_Slike::where("film_id", $id)->get();        
        return view('movie', compact('film', 'slike'));

    }
    //

    public function SviFilmoviUPonudi()
    {
        $films = Film::where("trenutno_aktivan", 1)->get();
        $uskoro = 0;
        $Zanr = "";
        return view('allFilmovi', compact('films', 'uskoro', 'Zanr'));
    }
    public function SviFilmoviUskoro()
    {
        $date = Carbon::today();
        $films = Film::where('pocetak_prikazivanja_date', '>', $date)->get();
        $uskoro = 1;
        $Zanr = "";
        return view('allFilmovi', compact('films', 'uskoro', 'Zanr'));
    }
    public function SviFilmoviZanr($zanr)
    {
        $films = Film::where("zanr", 'LIKE', '%' . $zanr . '%')->get();
        $uskoro = 0;
        $Zanr = Str::ucfirst($zanr);
        return view('allFilmovi', compact('films', 'uskoro', 'Zanr'));
    }

    public function RepertoarDanas()
    {


        $datum_p = Carbon::today()->toDateString();
        $films = DB::table('films')
            ->Join('projekcijas', function (JoinClause $join) {
                $join->on('films.id', '=', 'projekcijas.film_id')
                    ->whereDate('projekcijas.datum_i_vreme', Carbon::today());
            })
            ->select('films.*')->distinct()
            ->get();

        $projekcije = Projekcija::whereDate('datum_i_vreme', Carbon::today())->get();


        return view('repertoar_all', compact('projekcije', 'films', 'datum_p'));


    }

    public function RepertoarZanr(Request $request, $datum, $zanr)
    {

        if ($zanr != 'all') {
            $datum_p = $datum;
            $zanr_p = $zanr;
            session()->put('datum', $datum);

            $films = DB::table('films')
                ->join('projekcijas', function (JoinClause $join) use ($datum) {
                    $join->on('films.id', '=', 'projekcijas.film_id')
                        ->whereDate('projekcijas.datum_i_vreme', Carbon::parse($datum));
                })
                ->select('films.*')->distinct()
                ->where("zanr", 'LIKE', '%' . $zanr . '%')
                ->get();


            $projekcije = Projekcija::whereDate('datum_i_vreme', Carbon::parse($datum))->get();


            return view('repertoar_datum', compact('projekcije', 'films', 'datum_p', 'zanr_p'));

        } else {

            $datum_p = $datum;
            $films = DB::table('films')
                ->join('projekcijas', function (JoinClause $join) use ($datum) {
                    $join->on('projekcijas.film_id', '=', 'films.id')
                        ->whereDate('projekcijas.datum_i_vreme', Carbon::parse($datum));
                })
                ->select('films.*')->distinct()
                ->get();

            $projekcije = Projekcija::whereDate('datum_i_vreme', Carbon::parse($datum))->get();


            return view('repertoar_all', compact('projekcije', 'films', 'datum_p'));
        }
    }


    public function RepertoarFilm($id)
    {
        $datum_p = Carbon::today()->toDateString();
        $films = DB::table('films')
            ->Join('projekcijas', function (JoinClause $join) {
                $join->on('films.id', '=', 'projekcijas.film_id')
                    ->whereDate('projekcijas.datum_i_vreme', Carbon::today());
            })
            ->select('films.*')->distinct()
            ->where('films.id', $id)
            ->get();

        $projekcije = Projekcija::whereDate('datum_i_vreme', Carbon::today())->get();

        return view('repertoar_film', compact('projekcije', 'films', 'datum_p', 'id'));

    }

    public function RepertoarFilmDatum($id, $datum){
        $datum_p = $datum;
        $films = DB::table('films')
            ->select('films.*')->distinct()
            ->where('films.id', $id)
            ->get();

        $projekcije = Projekcija::whereDate('datum_i_vreme', Carbon::parse($datum))->get();


        return view('repertoar_film', compact('projekcije', 'films', 'datum_p', 'id'));
    }


    public function ProjekcijaOdabirMesta($id){
        $projekcija = DB::table('projekcijas')
            ->Join('films', 'projekcijas.film_id', '=', 'films.id')
            ->select('projekcijas.id as projekcija_id', 'films.poster as poster', 'films.naziv_filma as naziv_filma', 'projekcijas.datum_i_vreme as datum_i_vreme', 'projekcijas.cena_karte as cena_karte', 'projekcijas.sala_projekcije as sala', 'films.id as film_id')
            ->where('projekcijas.id', $id)
            ->first();
        $karte = Karta::where('projekcija_id', $id)->get();

            
            
                
                return view('odabir_mesta',compact('projekcija','karte'));

            
            
        
    }
}
