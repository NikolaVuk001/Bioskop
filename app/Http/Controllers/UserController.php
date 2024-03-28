<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      return view("kupovina", compact('projekcija', 'film', 'count', 'sedista'));
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


  public function UserUlaznice(){
    $id = Auth::user()->id;
    $ulaznice = DB::table('racuns')
                ->join('kartas', function (JoinClause $join) use ($id) {
                    $join->on('racuns.id', '=', 'kartas.racun_id')
                    ->where('racuns.user_id', '=', $id);                  
                })
                ->select('kartas.*')->distinct()
                ->where("user_id", $id)
                ->get();
    return view('user.ulaznice', compact('ulaznice'));
  }



}


