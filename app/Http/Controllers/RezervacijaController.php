<?php

namespace App\Http\Controllers;

use App\Mail\RezervacijaMail;
use App\Models\Rezervacija;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class RezervacijaController extends Controller
{
    public function createRezervacija(Request $request){

        $niz_sedista = [];
        
        $sedista_explode = explode(",", $request->sedista);
        foreach( $sedista_explode as $sediste_red) {
            array_push($niz_sedista, $sediste_red);
        }
        
        $rezervacije_ids = array();
        
        
        for($i = 0; $i < $request->br_karata; $i++){
            
            array_push($rezervacije_ids, Rezervacija::insertGetId([                
                'projekcija_id'=> $request->projekcija_id,
                'ime_i_prezime' => $request->ime_i_prezime,
                'email' => $request->user_email,                                                
                'sediste'=> $niz_sedista[$i],
                'user_id' => $request->user_id,
                'cena'=> $request->cena_karte,
                'datum'=> $request->datum_projekcije,
                'vreme'=> $request->vreme_projekcije,
                'sala_id'=> $request->sala,                
                'film_id'=> $request->film_id,
                'created_at'=> Carbon::now(),
            ]));

        }

        $rezervacije = DB::table('rezervacijas')->whereIn('id', $rezervacije_ids)->get();
        
        

        $qr_code = QrCode::size(200)->generate($rezervacije->toJson());

        //Slanje Email-a Sa QR Kodom

        $red_segmenti = explode('-', $rezervacije->first()->sediste);
        $red = $red_segmenti[0];
        $sedista = [];
        $br_rezervacija = 0;
        foreach ($rezervacije as $rez) {
            $rez_segmenti = explode("-",$rez->sediste);
            array_push($sedista, $rez_segmenti[1]);  
            $br_rezervacija++;         
          }        
        $sed_string = collect($sedista)->implode('-');
        

        $data_rezervacije = [
            'ime_i_prezime' => $rezervacije->first()->ime_i_prezime,
            'Projekcija' =>  DB::table('films')
            ->where('id', $rezervacije->first()->film_id)
            ->value('naziv_filma'),
            'Datum' => $rezervacije->first()->datum,
            'Vreme' => $rezervacije->first()->vreme,
            'Sala' => $rezervacije->first()->sala_id,
            'Red' => $red,
            'Sedista' => $sed_string,
            'Cena Karte' => $rezervacije->first()->cena,
            'Ukupna Cena' => $rezervacije->first()->cena * $br_rezervacija,
            'QR_Kod' => $qr_code,
        ];

        Mail::to($request->user_email)->send(new RezervacijaMail($data_rezervacije));

        
        return redirect()->route('zavrsena.rezervacija')->with([
            'qr_code' => $qr_code,
            'rezervacije' => $rezervacije
        ]);

        

        
    }
}
