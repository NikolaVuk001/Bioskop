<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;
use App\Models\Projekcija;
use App\Models\Film;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function Kupovina(Request $request)
  {    
    if ($request->count_ul <= 0) {
      $notification = array(
        'message' => 'Morate Izabrati Sediste.',
        'alert-type' => 'warning'
      );

      return redirect()->back()->with($notification);
    }
    
    

    if (Auth::check()) {
      $sedista = $request->sedista_ul;      
      
      $count = $request->count_ul;
      $film = Film::where("id", $request->film_id)->first();
      $projekcija = Projekcija::where('id', $request->projekcija_id)->first();

      // Provera Da li su sedišta zauzeta
      $karte_i_rezervacije = DB::table('kartas')
      ->Join('rezervacijas', 'kartas.projekcija_id', '=', 'rezervacijas.projekcija_id')
      ->select('kartas.sediste as k_sedista', 'rezervacijas.sediste as r_sedista')
      ->where('kartas.projekcija_id',$projekcija->id)  
      ->get();
      

      $karte_i_rezervacije = $karte_i_rezervacije->toArray();
      $zauzeta_sedista = [];
      foreach ($karte_i_rezervacije as $sediste) {
        array_push($zauzeta_sedista, $sediste->k_sedista);
        array_push($zauzeta_sedista, $sediste->r_sedista);
      }

      $explod_sed = explode(',', $sedista);

      $zauzeto = false;

      foreach ($explod_sed as $str) {
        if (in_array($str, $zauzeta_sedista)) {
            $zauzeto = true;
            break;
        }
    }

      if ($zauzeto) {
        $notification = array(
          'message' => 'Izabrana sedišta su zauzeta',
          'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
       }

      

      return view("kupovina", compact('projekcija', 'film', 'count', 'sedista'));
    }else {
      $back_url = Request::url();
      return view("auth.login", compact("back_url"));
    }
  }

  public function Rezervacija(Request $request)
  {
    if ($request->count_ul <= 0) {
      $notification = array(
        'message' => 'Morate Izabrati Sediste',
        'alert-type' => 'warning'
      );      
      return redirect()->back()->with($notification);
    }
    if (Auth::check()) {
      $sedista = $request->sedista_ul;
      $count = $request->count_ul;
      $film = Film::where("id", $request->film_id)->first();
      $projekcija = Projekcija::where('id', $request->projekcija_id)->first();

      // Provera Da li su sedišta zauzeta
      $karte_i_rezervacije = DB::table('kartas')
      ->Join('rezervacijas', 'kartas.projekcija_id', '=', 'rezervacijas.projekcija_id')
      ->select('kartas.sediste as k_sedista', 'rezervacijas.sediste as r_sedista')
      ->where('kartas.projekcija_id',$projekcija->id)  
      ->get();
      

      $karte_i_rezervacije = $karte_i_rezervacije->toArray();
      $zauzeta_sedista = [];
      foreach ($karte_i_rezervacije as $sediste) {
        array_push($zauzeta_sedista, $sediste->k_sedista);
        array_push($zauzeta_sedista, $sediste->r_sedista);
      }

      $explod_sed = explode(',', $sedista);

      $zauzeto = false;

      foreach ($explod_sed as $str) {
        if (in_array($str, $zauzeta_sedista)) {
            $zauzeto = true;
            break;
        }
    }

      if ($zauzeto) {
        $notification = array(
          'message' => 'Izabrana sedišta su zauzeta',
          'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
       }
       
      return view("rezervacija", compact('projekcija', 'film', 'count', 'sedista'));
    } else {
      $back_url = Request::url();
      return view("auth.login", compact("back_url"));
    }
  }


  public function UserProfil()
  {
    return view("user.profil");
  }

  public function UserProfilUpdate(Request $request)
  {

    $id = Auth::user()->id;
    $data = User::find($id);
    $user = User::where('id', $id)->first();
    $email = $request->email;

        $emailExists = User::where('email', $email)->where('id', '!=', $id)->exists();

        if ($emailExists) {
            $notification = array(
                'message' => 'Email adresa je već zauzeta od strane drugog korisnika',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }


    if ($request->pass == null) {
      $data->name = $request->name;
      $data->surname = $request->surname;
      $data->email = $request->email;

      $data->save();

      $notification = array(
        'message' => 'Uspesno Izmenjeni Podaci',
        'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
    }
  }


  public function UserUlaznice()
  {
    $id = Auth::user()->id;
    $ulaznice = 
      DB::table('projekcijas')
            ->Join('films', 'projekcijas.film_id', '=', 'films.id')
            ->select('projekcijas.id as projekcija_id', 'films.poster as poster', 'films.naziv_filma as naziv_filma', 'projekcijas.datum_i_vreme as datum_i_vreme', 'projekcijas.cena_karte as cena_karte', 'projekcijas.sala_projekcije as sala', 'films.id as film_id')
            ->where('projekcijas.id', $id)
            ->first();
    return view('user.ulaznice', compact('ulaznice'));
  }

  public function ZavrsenaRezervacija(Request $request)
  {

    if (session('rezervacije') == null) {
      return redirect()->route('pocetna');
    } else {

      $qr_code = session('qr_code');
      $rezervacije = session('rezervacije');

      $notification = array(
        'message' => 'Uspesno Rezervisane Karte',
        'alert-type' => 'success'
      );
      return view('zavrsena_rezervacija', compact('qr_code', 'rezervacije', 'notification'));

    }


  }

  public function ZavrsenRacun(Request $request)
  {

    if (session('karte') == null) {
      return redirect()->route('pocetna');
    } else {

      $qr_code = session('qr_code');
      $karte = session('karte');
      $racun = session('racun');

      $notification = array(
        'message' => 'Uspesno Kupljene Karte',
        'alert-type' => 'success'
      );
      return view('zavrsena_kupovina', compact('qr_code', 'karte', 'notification', 'racun'));

    }

  }



}


