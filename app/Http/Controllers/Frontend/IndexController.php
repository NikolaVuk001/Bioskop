<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Karta;
use App\Models\Projekcija;
use App\Models\Sediste;
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

    public function sviFilmoviUPonudi()
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
                    ->whereDate('projekcijas.datum_i_vreme','=', Carbon::today())
                    ->where('projekcijas.datum_i_vreme', '>' ,Carbon::now()->toDateTime());
            })
            ->select('films.*')->distinct()
            ->get();

        // $projekcije = Projekcija::whereTime('datum_i_vreme', '<' ,Carbon::now()->toDateTime())
        // ->get();        
        


        return view('repertoar_all', compact('films', 'datum_p'));
    }

    public function RepertoarZanr(Request $request, $datum, $zanr)
    {
        if ($zanr != 'all') {
            $datum_p = $datum;
            $zanr_p = $zanr;
            session()->put('datum', $datum);
            
            $carbon_datum = Carbon::parse($datum);
            if($carbon_datum == Carbon::today()){                     
                $films = DB::table('films')
                ->join('projekcijas', function (JoinClause $join) use ($datum) {
                    $join->on('films.id', '=', 'projekcijas.film_id')
                    ->whereDate('projekcijas.datum_i_vreme','=', Carbon::today())
                    ->where('projekcijas.datum_i_vreme', '>' ,Carbon::now()->toDateTime());
                })
                ->select('films.*')->distinct()
                ->where("zanr", 'LIKE', '%' . $zanr . '%')
                ->get();           
                $projekcije = Projekcija::where('datum_i_vreme', '>' ,Carbon::now())
                ->get();
                
            } 
            else {
                
                $films = DB::table('films')
                ->join('projekcijas', function (JoinClause $join) use ($datum) {
                    $join->on('films.id', '=', 'projekcijas.film_id')
                        ->whereDate('projekcijas.datum_i_vreme', Carbon::parse($datum));
                })
                ->select('films.*')->distinct()
                ->where("zanr", 'LIKE', '%' . $zanr . '%')
                ->get();
                $projekcije = Projekcija::whereDate('datum_i_vreme', Carbon::parse($datum))->get();
            }
            
            


            return view('repertoar_datum', compact('projekcije', 'films', 'datum_p', 'zanr_p'));

        } else {

            $datum_p = $datum;

            $carbon_datum = Carbon::parse($datum);
            if($carbon_datum == Carbon::today()){
                $films = DB::table('films')
                ->join('projekcijas', function (JoinClause $join) use ($datum) {
                    $join->on('projekcijas.film_id', '=', 'films.id')
                    ->whereDate('projekcijas.datum_i_vreme','=', Carbon::today())
                    ->where('projekcijas.datum_i_vreme', '>' ,Carbon::now()->toDateTime());
                })
                ->select('films.*')->distinct()
                ->get();
                $projekcije = Projekcija::where('datum_i_vreme', '>' ,Carbon::now())
                ->get();       
                                  
            }
            else {
                $films = DB::table('films')
                ->join('projekcijas', function (JoinClause $join) use ($datum) {
                    $join->on('projekcijas.film_id', '=', 'films.id')
                        ->whereDate('projekcijas.datum_i_vreme', Carbon::parse($datum));
                })
                ->select('films.*')->distinct()
                ->get();
                $projekcije = Projekcija::whereDate('datum_i_vreme', Carbon::parse($datum))->get();
                
            }
            
            $zanr_p = 'all';

            return view('repertoar_datum', compact('projekcije', 'films', 'datum_p', 'zanr_p'));
        }
    }


    public function RepertoarFilm($id)
    {
        $datum_p = Carbon::today()->toDateString();
        $film = DB::table('films')->find($id);

        $projekcije = Projekcija::where('film_id', $film->id)
              ->whereDate('datum_i_vreme', '=', Carbon::today())
              ->where('datum_i_vreme', '>' ,Carbon::now()->toDateTime())            
              ->orderBy('datum_i_vreme', 'asc')
              ->get();

        return view('repertoar_film', compact('projekcije', 'film', 'datum_p', 'id'));

    }

 
    public function RepertoarFilmDatum($id, $datum)
    {
        $datum_p = $datum;
        $datumTime = Carbon::parse($datum);

        if ($datumTime->isToday()) {
            $this->RepertoarFilm($id);
        }

        $film = DB::table('films')->find($id);
            

        if ($datumTime->isToday()) {
            $projekcije = Projekcija::where('film_id', $film->id)
              ->whereDate('datum_i_vreme', '=', Carbon::today())
              ->where('datum_i_vreme', '>' ,Carbon::now()->toDateTime())            
              ->orderBy('datum_i_vreme', 'asc')
              ->get();  
        } else {
            $projekcije = Projekcija::where('film_id', $film->id)
              ->whereDate('datum_i_vreme', '=', $datum)                     
              ->orderBy('datum_i_vreme', 'asc')
              ->get();  
        }

        return view('repertoar_film', compact('projekcije', 'film', 'datum_p', 'id'));
    }



    public function ProjekcijaOdabirMesta($id){
        $projekcija = DB::table('projekcijas')
            ->Join('films', 'projekcijas.film_id', '=', 'films.id')
            ->select('projekcijas.id as projekcija_id', 'films.poster as poster', 'films.naziv_filma as naziv_filma', 'projekcijas.datum_i_vreme as datum_i_vreme', 'projekcijas.cena_karte as cena_karte', 'projekcijas.sala_projekcije as sala', 'films.id as film_id')
            ->where('projekcijas.id', $id)
            ->first();
        $karte = DB::table('kartas')
            ->select('kartas.sediste as sediste')
            ->where('kartas.projekcija_id',$id)
            ->get()
            ->toArray();
        $rezervacije = DB::table('rezervacijas')
        ->select('rezervacijas.sediste as sediste')
        ->where('rezervacijas.projekcija_id',$id)->where('rezervacijas.aktivna',1)
        ->get()
        ->toArray();

        $karte_rezervacije = array_merge($karte, $rezervacije);
        

        $sedista = Sediste::latest()->get();

        $niz_zauzetih_mesta = [];
        for($i = 0; $i < count($karte_rezervacije); $i++){
            $niz_zauzetih_mesta[$i] = $karte_rezervacije[$i]->sediste;
        }

        $rezervacije = Carbon::now()->diffInMinutes($projekcija->datum_i_vreme,false) >= 20;
     
        return view('odabir_mesta',compact('projekcija','sedista','niz_zauzetih_mesta','rezervacije'));  
    }

    public function getNovosti() {
        return view('novosti');
    }

    
}
