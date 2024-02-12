<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Karta;
use App\Models\Projekcija;
use App\Models\Racun;
use App\Models\Sala;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller
{
    public function StripeProdaja(Request $request)
    {

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51OiwBoKVJdMdHQXZSBy0ewEaQ3JHOzml1QGRkvUkL6NxAKBI9Pf0aPZg7QvN5dvACnRCYWH6cI2P9vTE7qCw35MG00vi41GGsm');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->uk_cena*100,
            'currency' => 'eur',
            'description' => 'Bioskop Karte Charge',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);

        $racun_id = Racun::insertGetId([
            'user_id'=> Auth::user()->id,
            'payment_type'=> $charge->id,
            'peyment_method'=> $charge->payment_method,
            'transaction_id'=> $charge->balance_transaction,
            'currency'=> $charge->currency,
            'uk_cena'=> $request->uk_cena,
            'racun_br'=> $charge->metadata->order_id,
            'invocie_no'=> 'BIOSKOP'.mt_rand(10000000,99999999),
            'racun_datum'=> Carbon::now()->format('d F Y'),
            'racun_mesec'=> Carbon::now()->format('F'),
            'racun_godina'=> Carbon::now()->format('Y'),
            'created_at'=> Carbon::now(),
        ]);

        $niz_sedista = [];

        for( $i = 0, $j = 0; $i < $request->br_karata; $i++ ) {

            $niz_sedista[$i] = substr($request->sedista, $j, 3);
            $j = $j + 4;
        }

        for( $i = 0; $i < $request->br_karata; $i++ ) {


            Karta::insert([
                'projekcija_id'=> $request->projekcija_id,
                'racun_id'=> $racun_id,
                'sediste'=> $niz_sedista[$i],
                'cena'=> $request->cena_karte,
                'datum'=> $request->datum_projekcije,
                'vreme'=> $request->vreme_projekcije,
                'sala_id'=> $request->sala,
                'film_id'=> $request->film_id,
                'created_at'=> Carbon::now(),
            ]);
            
        }

        $notification = array(
            'message' => 'Uspesno Kupljene Karte',
            'alert-type' => 'success'
        );

        return redirect()->route('pocetna')->with($notification);

        



    }
    //
}
