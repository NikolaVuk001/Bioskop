<?php

namespace App\Http\Controllers;
use App\Models\Film;
use App\Models\Karta;
use App\Models\Projekcija;
use App\Models\Rezervacija;
use App\Models\Sala;


use App\Models\Sediste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjekcijaController extends Controller
{


    public function AddProjekcija(){
        $salas = Sala::latest()->get();
        $films = Film::where("trenutno_aktivan", 1)->get();
        return view("admin.projekcija.projekcija_add",compact("films","salas"));
    }
    //


    public function StoreProjekcija(Request $request){

        $request->validate([
            "film" => ["required"],
            "sala" => ["required"],
            "datum_i_vreme" => ["required", "date", "after_or_equal:now"],
            "cena_karte" => ["required", "numeric", "min:0", "max:5000"],
        ]);


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
        $projekcije = Projekcija::latest()->orderBy('datum_i_vreme','asc')->get();        
        return view('admin.projekcija.projekcija_all',compact('projekcije'));
    }

    public function AllTrenutneProjekcija(Request $request){        
        $projekcije = Projekcija::whereDate('datum_i_vreme', '=', Carbon::today())->orderBy('datum_i_vreme','asc')->get();
        return view('admin.projekcija.projekcija_all',compact('projekcije'));
    }

    public function InfoProjekcija(int $id) {
        $projekcija = Projekcija::where('id',$id)->first();
        $karte = Karta::where('projekcija_id',$projekcija->id)->orderBy('created_at', 'desc')->get();
        $rezervacije = Rezervacija::where('projekcija_id',$projekcija->id)->where('aktivna',1)->orderBy('created_at', 'desc')->get();
        $br_karata = 0;
        $br_rezervacija = 0;
        $karte_sed = [];
        foreach($karte as $karta) {
            array_push($karte_sed,$karta->sediste);
            $br_karata++;
        }
        $rezervacije_sed = [];
        foreach($rezervacije as $rezervacija) {
            array_push($rezervacije_sed,$rezervacija->sediste);
            $br_rezervacija++;
        }
        
        $karte_rezervacije = array_merge($karte_sed, $rezervacije_sed);
        $niz_zauzetih_mesta = [];
        for($i = 0; $i < count($karte_rezervacije); $i++){
            $niz_zauzetih_mesta[$i] = $karte_rezervacije[$i];
        }
        $sedista = Sediste::latest()->get();        

        return view('admin.projekcija.projekcija_info',compact('projekcija','sedista','niz_zauzetih_mesta','br_karata','br_rezervacija', 'rezervacije', 'karte'));
    }

    public function editProjekcija(int $id) {
        $projekcija = Projekcija::where('id',$id)->first();   
        $films = Film::where("trenutno_aktivan", 1)->get();   
        $salas = Sala::latest()->get();  

        return view('admin.projekcija.projekcija_edit',compact('projekcija','films','salas'));
    }

    public function updateProjekcija(Request $request) {
        $film = Film::where("id",$request->film)->first();
        $sala = Sala::where("id",$request->sala)->first();
        Projekcija::findOrFail($request->id)->update([
            "naziv_filma"=> $film->naziv_filma,
            "film_id"=> $request->film,
            "datum_i_vreme"=> $request->datum_i_vreme,
            "sala_projekcije"=> $request->sala,
            "cena_karte"=> $request->cena_karte,
            "broj_slobodnih_mesta"=> $sala->broj_mesta,
            "updated_at"=> Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Projekcija Je Izmenjena Projekcija',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteProjekcija($id) {
        Projekcija::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Projekcija Je Uspešno Otkazana',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }
}
