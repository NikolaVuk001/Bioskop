<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use App\Models\Film;

class HomeSliderController extends Controller
{
    // Slide 1
    public function HomeSlider()
    {
        $films = Film::latest()->get();
        $slide1 = HomeSlide::where("id", 1)->first();
        $slide2 = HomeSlide::where("id", 2)->first();
        $slide3 = HomeSlide::where("id",3)->first();
        return view('admin.home_slide.home_slide_all', compact('films', 'slide1','slide2','slide3'));
    }

    public function UpdateSlide(Request $request)
    {
        HomeSlide::findOrFail(1)->update([
            'film_id' => $request->slide1,
            'nazivFilma'=> Film::where('id', $request->slide1)->first()->naziv_filma,
        ]);
        HomeSlide::findOrFail(2)->update([
            'film_id' => $request->slide2,
            'nazivFilma'=> Film::where('id', $request->slide2)->first()->naziv_filma,
        ]);

        HomeSlide::findOrFail(3)->update([
            'film_id' => $request->slide3,
            'nazivFilma'=> Film::where('id', $request->slide3)->first()->naziv_filma,
        ]);

        $notification = array(
            'message' => 'Slide 11z Podaci Uspesno Izmenjeni',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}








