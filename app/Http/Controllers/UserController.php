<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Projekcija;
use App\Models\Film;

class UserController extends Controller
{
  public function Kupovina(Request $request){
    if($request->count_ul <= 0){
      $notification = array(
        'message' => 'Morate Izabrati Sediste',
        'alert-type' => 'warning'
    );

    return redirect()->back()->with($notification);
    }
    if(Auth::check()){
      $sedista = $request->sedista_ul;
      $count = $request->count_ul;
      $film = Film::where("id", $request->film_id)->first();
      $projekcija = Projekcija::where('id', $request->projekcija_id)->first();
      return view("kupovina",compact('projekcija','film','count','sedista'));
    }
    else{
      $back_url = Request::url();
      return view("auth.login",compact("back_url"));
    }
  }
    
}
