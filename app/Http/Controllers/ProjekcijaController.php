<?php

namespace App\Http\Controllers;
use App\Models\Film;
use App\Models\Projekcija;
use App\Models\Sala;


use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjekcijaController extends Controller
{


    public function AddProjekcija(){
        $salas = Sala::latest()->get();
        $films = Film::where("trenutno_aktivan", 1)->get();
        return view("admin.projekcija.projekcija_add",compact("films","salas"));
    }
    //


    public function StoreProjekcija(Request $request){
        $film = Film::where("id",$request->film)->first();
        $sala = Sala::where("id",$request->sala)->first();
        Projekcija::insert([
            "naziv_filma"=> $film->naziv_filma,
            "film_id"=> $request->film,
            "datum_i_vreme"=> $request->datum_i_vreme,
            "sala_projekcije"=> $request->sala,
            "cena_karte"=> $request->cena_karte,
            "broj_slobodnih_mesta"=> $sala->broj_mesta,
            "created_at"=> Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Projekcija Je Uspesno Dodata',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllProjekcija(Request $request){
        $projekcije = Projekcija::latest()->get();
        return view('admin.projekcija.projekcija_all',compact('projekcije'));
    }

    public function AllTrenutneProjekcija(Request $request){
        $date = today()->format('Y-m-d');
        $projekcije = Projekcija::where('datum_i_vreme', '>=', $date)->get();
        return view('admin.projekcija.projekcija_all',compact('projekcije'));
    }
}
