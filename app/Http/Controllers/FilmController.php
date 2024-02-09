<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multi_Slike;
use App\Models\Film;
use Carbon\Carbon;

class FilmController extends Controller
{

    public function AllFilms()
    {
        $films = Film::latest()->get();
        return view('admin.film.film_all', compact('films'));
    }

    public function AddFilms()
    {
        return view('admin.film.film_add');
    }

    public function StoreFilm(Request $request)
    {

        $poster = $request->file('poster');
        $name_gen_poster = hexdec(uniqid()) . '.' . $poster->getClientOriginalExtension();
        $save_url_poster = 'upload/Film/Posters/' . $name_gen_poster;
        $poster->move(public_path('upload/Film/Posters') , $name_gen_poster);
        

        $slide_poster = $request->file('slide_poster');
        $name_gen_slide = hexdec(uniqid()) . '.' . $slide_poster->getClientOriginalExtension();
        $save_url_slide = 'upload/Film/SlidePosters/' . $name_gen_slide;
        $slide_poster->move(public_path('upload/Film/SlidePosters') , $name_gen_slide);
        $aktivan = 1;
        // if ($request->trenutno_aktivan->checked) {
        //     $aktivan = 1;
        // }

        $film_id = Film::insertGetId([
            'naziv_filma' => $request->naziv_filma,
            'duzina_filma' => $request->duzina_filma,
            'zanr' => $request->zanr,
            'opis' => $request->opis,
            'opis_kratak'=> $request->opis_kratak,
            'trailer_url'=> $request->trailer_url,
            'poster' => $save_url_poster,
            'slide_poster' => $save_url_slide,
            'pocetak_prikazivanja' => $request->pocetak_prikazivanja,
            'glumci' => $request->glumci,
            'reziser' => $request->reziser,
            'distributer' => $request->distributer,
            'trenutno_aktivan' => $aktivan,
            'cena_karte' => $request->cena_karte,
            'created_at' => Carbon::now(),

        ]);


         /// Multiple Image Upload From her //////

         $images = $request->file('slike_filma');
         foreach($images as $img){
             $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
         $img->move(public_path('upload/Film/Slike'), $make_name);
         $uploadPath = 'upload/Film/Slike/'.$make_name;
 
 
         Multi_Slike::insert([
 
             'film_id' => $film_id,
             'naziv_slike' => $uploadPath,
             'created_at' => Carbon::now(), 
 
         ]); 
         } // end foreach
 
         /// End Multiple Image Upload From her //////
 

        

        // $slike_filma = $request->file('slike_filma');
        // foreach ($slike_filma as $img) {
        //     $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        //     $save_url = 'upload/Film/Slike/' . $name_gen;
        //     $img->move(public_path('upload/Film/Slike', $name_gen));

        //     Multi_Slike::insert([
        //         'film_id'=> $film_id,
        //         'naziv_slike'=> $save_url,
        //         'created_at' => Carbon::now(),
        //     ]);
        // }

        $notification = array(
            'message' => 'Film Je Uspesno Dodat',
            'alert-type' => 'success'
        ); 
        return redirect()->route('all.film')->with($notification);




    }








    //
}
