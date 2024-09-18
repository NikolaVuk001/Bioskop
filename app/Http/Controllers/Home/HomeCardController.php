<?php

namespace App\Http\Controllers\home;
use App\Models\Film;
use App\Models\HomeCards;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeCardController extends Controller
{
    public function HomeCards()
    {
        $films = Film::latest()->get();
        $card1 = HomeCards::where("id", 1)->first();
        $card2 = HomeCards::where("id", 2)->first();
        $card3 = HomeCards::where("id",3)->first();
        $card4 = HomeCards::where("id",4)->first();
        $card5 = HomeCards::where("id",5)->first();
        return view('admin.home_cards.home_cards_all', compact('films', 'card1','card2','card3','card4','card5'));
    }
    //


    public function UpdateCards(Request $request)
    {   
        HomeCards::findOrFail(1)->update([
            'film_id' => $request->card1,
            'naziv_filma'=> Film::where('id', $request->card1)->first()->naziv_filma,
        ]);
        HomeCards::findOrFail(2)->update([
            'film_id' => $request->card2,
            'naziv_filma'=> Film::where('id', $request->card2)->first()->naziv_filma,
        ]);

        HomeCards::findOrFail(3)->update([
            'film_id' => $request->card3,
            'naziv_filma'=> Film::where('id', $request->card3)->first()->naziv_filma,
        ]);
        HomeCards::findOrFail(4)->update([
            'film_id' => $request->card4,
            'naziv_filma'=> Film::where('id', $request->card4)->first()->naziv_filma,
        ]);
        HomeCards::findOrFail(5)->update([
            'film_id' => $request->card5,
            'naziv_filma'=> Film::where('id', $request->card5)->first()->naziv_filma,
        ]);

        $notification = array(
            'message' => 'Card Podaci Uspesno Izmenjeni',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
