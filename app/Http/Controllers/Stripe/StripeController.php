<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Mail\RacunMail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Karta;
use App\Models\Projekcija;
use App\Models\Racun;
use App\Models\Sala;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;



class StripeController extends Controller
{
    public function StripeProdaja(Request $request)
    {

        \Stripe\Stripe::setApiKey('sk_test_51OiwBoKVJdMdHQXZSBy0ewEaQ3JHOzml1QGRkvUkL6NxAKBI9Pf0aPZg7QvN5dvACnRCYWH6cI2P9vTE7qCw35MG00vi41GGsm');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->uk_cena * 100,
            'currency' => 'eur',
            'description' => 'Bioskop Karte Charge',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        if ($charge->outcome) {

            $racun_id = Racun::insertGetId([
                'user_id' => Auth::user()->id,
                'payment_type' => $charge->id,
                'peyment_method' => $charge->payment_method,
                'transaction_id' => $charge->balance_transaction,
                'currency' => $charge->currency,
                'uk_cena' => $request->uk_cena,
                'racun_br' => $charge->metadata->order_id,
                'invocie_no' => 'BIOSKOP' . mt_rand(10000000, 99999999),
                'racun_datum' => Carbon::now()->format('d F Y'),
                'racun_mesec' => Carbon::now()->format('F'),
                'racun_godina' => Carbon::now()->format('Y'),
                'created_at' => Carbon::now(),
            ]);

            $niz_sedista = [];

            $sedista_explode = explode(",", $request->sedista);
            foreach ($sedista_explode as $sediste_red) {
                array_push($niz_sedista, $sediste_red);
            }

            for ($i = 0; $i < $request->br_karata; $i++) {


                Karta::insert([
                    'projekcija_id' => $request->projekcija_id,
                    'racun_id' => $racun_id,
                    'sediste' => $niz_sedista[$i],
                    'cena' => $request->cena_karte,
                    'datum' => $request->datum_projekcije,
                    'vreme' => $request->vreme_projekcije,
                    'sala_id' => $request->sala,
                    'film_id' => $request->film_id,
                    'created_at' => Carbon::now(),
                ]);

            }

            $racun = Racun::findOrFail($racun_id);
            $karte = DB::table('kartas')->where('racun_id', $racun_id)->get();


            $red_segmenti = explode('-', $karte->first()->sediste);
            $red = $red_segmenti[0];
            $sedista = [];
            foreach ($karte as $karta) {
                $karta_segmenti = explode("-", $karta->sediste);
                array_push($sedista, $karta_segmenti[1]);
            }
            $sed_string = collect($sedista)->implode('-');

            $qr_code = QrCode::size(200)->generate($karte->toJson());

            $data_racun = [
                'Broj Racuna' => $racun->invocie_no,
                'Projekcija' => DB::table('films')
                    ->where('id', $karte->first()->film_id)
                    ->value('naziv_filma'),
                'Datum' => $karte->first()->datum,
                'Vreme' => $karte->first()->vreme,
                'Sala' => $karte->first()->sala_id,
                'Red' => $red,
                'Sedista' => $sed_string,
                'Ukupna Cena' => $racun->uk_Cena,
                'QR_Kod' => $qr_code,
            ];

            Mail::to(Auth::user()->email)->send(new RacunMail($data_racun));



            //Notifikacija O Uspesnosti
            $notification = array(
                'message' => 'Uspesno Kupljene Karte',
                'alert-type' => 'success'
            );

            return redirect()->route('zavrsen.racun')->with([
                'qr_code' => $qr_code,
                'karte' => $karte,
                'racun' => $racun
            ]);
        } else {
            //Notifikacija O Neuspesnoj naplati
            $notification = array(
                'message' => 'Naplata nije uspešna.',
                'alert-type' => 'warrning'
            );
            return redirect()->back()->with($notification);
        }






    }
    //
}
