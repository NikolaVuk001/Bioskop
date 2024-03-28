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
        $poster->move(public_path('upload/Film/Posters'), $name_gen_poster);


        $slide_poster = $request->file('slide_poster');
        $name_gen_slide = hexdec(uniqid()) . '.' . $slide_poster->getClientOriginalExtension();
        $save_url_slide = 'upload/Film/SlidePosters/' . $name_gen_slide;
        $slide_poster->move(public_path('upload/Film/SlidePosters'), $name_gen_slide);
        $aktivan = 0;

        $film_id = Film::insertGetId([
            'naziv_filma' => $request->naziv_filma,
            'duzina_filma' => $request->duzina_filma,
            'zanr' => $request->zanr,
            'opis' => $request->opis,
            'opis_kratak' => $request->opis_kratak,
            'trailer_url' => $request->trailer_url,
            'poster' => $save_url_poster,
            'slide_poster' => $save_url_slide,
            'pocetak_prikazivanja' => $request->pocetak_prikazivanja,
            'pocetak_prikazivanja_date' => $request->pocetak_prikazivanja_date,
            'glumci' => $request->glumci,
            'reziser' => $request->reziser,
            'distributer' => $request->distributer,
            'trenutno_aktivan' => $aktivan,            
            'created_at' => Carbon::now(),

        ]);

        $images = $request->file('slike_filma');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload/Film/Slike'), $make_name);
            $uploadPath = 'upload/Film/Slike/' . $make_name;


            Multi_Slike::insert([

                'film_id' => $film_id,
                'naziv_slike' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }
        $notification = array(
            'message' => 'Film Je Uspesno Dodat',
            'alert-type' => 'success'
        );
        return redirect()->route('all.film')->with($notification);

    }

    public function EditFilm($id)
    {
        $multiImgs = Multi_Slike::where('film_id', $id)->get();
        $films = Film::findOrFail($id);
        return view('admin.film.film_edit', compact('films','multiImgs'));
    }


    public function UpdateFilm(Request $request)
    {
        $film_id = $request->id;
        Film::findOrFail($request->id)->update([
            'naziv_filma' => $request->naziv_filma,
            'duzina_filma' => $request->duzina_filma,
            'zanr' => $request->zanr,
            'opis' => $request->opis,
            'opis_kratak' => $request->opis_kratak,
            'trailer_url' => $request->trailer_url,
            'pocetak_prikazivanja' => $request->pocetak_prikazivanja,
            'glumci' => $request->glumci,
            'reziser' => $request->reziser,
            'distributer' => $request->distributer,            
            'updated_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Film Je Uspesno Izmenjen',
            'alert-type' => 'success'
        );
        return redirect()->route('all.film')->with($notification);
    }

    public function UpdateFilmPoster(Request $request)
    {

        if($request->file('poster') != null){
            $film_id = $request->id;
            $old_poster = $request->old_poster;
    
            $poster = $request->file('poster');
            $name_gen_poster = hexdec(uniqid()) . '.' . $poster->getClientOriginalExtension();
            $save_url_poster = 'upload/Film/Posters/' . $name_gen_poster;
            $poster->move(public_path('upload/Film/Posters'), $name_gen_poster);
    
            if (file_exists($old_poster)) {
                unlink($old_poster);
            }
    
            Film::findOrFail($film_id)->update([
                'poster' => $save_url_poster,
                'updated_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Poster Filma Je Uspesno Izmenjen',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
        else{
            $notification = array(
                'message' => 'Morate Uneti Novi Poster',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
       

    }

    public function UpdateFilmSlidePoster(Request $request)
    {

        if ($request->file('slide_poster') != null) {
            $film_id = $request->id;
            $old_slide_poster = $request->old_slide_poster;

            $slide_poster = $request->file('slide_poster');
            $name_gen = hexdec(uniqid()) . '.' . $slide_poster->getClientOriginalExtension();
            $save_url = 'upload/Film/SlidePosters/' . $name_gen;
            $slide_poster->move(public_path('upload/Film/SlidePosters'), $name_gen);

            if (file_exists($old_slide_poster)) {
                unlink($old_slide_poster);
            }

            Film::findOrFail($film_id)->update([
                'slide_poster' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slide Poster Filma Je Uspesno Izmenjen',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
        else{
            $notification = array(
                'message' => 'Morate Uneti Novi Slide Poster',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }

    public function UpdateFilmSlikeFilma(Request $request){
        $slike = $request->slike_filma;

        foreach($slike as $id => $img){
            $imgDel = Multi_Slike::findOrFail($id);
            
            // unlink($imgDel->naziv_slike);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload/Film/Slike'), $make_name);
            $uploadPath = 'upload/Film/Slike/' . $make_name;

            Multi_Slike::where('id', $id)->update([
                'naziv_slike'=> $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Slika Filma Je Uspesno Izmenjena',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }

    public function FilmInactive($id){
        Film::findOrFail($id)->update([
            'trenutno_aktivan'=> 1,
        ]);
        $notification = array(
            'message' => 'Film Je Sada U Prodaji',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function FilmActive($id){
        Film::findOrFail($id)->update([
            'trenutno_aktivan'=> 0,
        ]);
        $notification = array(
            'message' => 'Film Nije Vise U Prodaji',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function DeleteFilm($id){
        $film = Film::findOrFail($id);
        unlink($film->poster);
        unlink($film->slide_poster);
        Film::findOrFail($id)->delete();

        $slike_filma = Multi_Slike::where('film_id', $id)->get();
        foreach($slike_filma as $img){
            unlink($img->naziv_slike);
            Multi_Slike::where('film_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Film Je Obrisan Uspesno',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    








    //
}
