<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;

class HomeSliderController extends Controller
{
    // Slide 1
    public function HomeSlider(){

        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
    }

    public function UpdateSlide(Request $request){

        $slide_id = $request->id;

        if($request->file('home_slide_img')) {
            $img = $request->file('home_slide_img');
            $name_gen = hexdec(uniqid()).'.'. $img->getClientOriginalExtension();
            

            $save_url = 'upload/home_slide_img/'. $name_gen;
            $img->move(public_path('upload/home_slide_img'),$name_gen);

            HomeSlide::findOrFail($slide_id)->update([
                'nazivFilma' => $request->nazivFilma,
                'opis' => $request->opis,
                'home_slide_img' => $save_url,                
            ]);

            $notification = array(
                'message' => 'Slide 1asdasd Podaci Uspesno Izmenjeni',
                'alert-type' => 'success'
            ); 
            return redirect()->back()->with($notification);
        }
        else{
            HomeSlide::findOrFail($slide_id)->update([
                'nazivFilma' => $request->nazivFilma,
                'opis' => $request->opis,                               
            ]);

            $notification = array(
                'message' => 'Slide 11z Podaci Uspesno Izmenjeni',
                'alert-type' => 'success'
            ); 
            return redirect()->back()->with($notification);

        }

    }

    //Slide 2



    public function HomeSlider2(){

        $homeslide = HomeSlide::find(2);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
    }

   


    // Slide 3
    public function HomeSlider3(){

        $homeslide = HomeSlide::find(3);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
    }

    
}
