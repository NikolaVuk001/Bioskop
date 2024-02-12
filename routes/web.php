<?php

use App\Http\Controllers\movieController;
use App\Http\Controllers\repertoarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProjekcijaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeCardController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Stripe\StripeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('Test', function () {
    return view('TEST');
});


// Grupisanje Kontrolera Radi Laksesg rutiranja
Route::controller(movieController::class)->group(function (){
    Route::get('Film','getMovies');
});

Route::controller(repertoarController::class)->group(function (){
    Route::get('Repertoar','getRepertoar');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('admin/dashboard', function () {
        return view('admin.index');
    });
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dasboard');
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/edit/profile/changePassword', 'ChangePassword')->name('change.password');
        Route::post('/edit/profile/updatePassowrd', 'UpdatePassword')->name('update.password');Route::get('/edit/profile/changePassword', 'ChangePassword')->name('change.password');

        
    });


    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('/home/slide', 'HomeSlider')->name('home.slide');
        Route::post('/update/slide', 'UpdateSlide')->name('update.slide');
    });

    Route::controller(HomeCardController::class)->group(function () {
        Route::get('/home/cards', 'HomeCards')->name('home.cards');
        Route::post('/update/cards', 'UpdateCards')->name('update.cards');
    });


    Route::controller(FilmController::class)->group(function () {
        Route::get('/all/Film', 'AllFilms')->name('all.film');
        Route::get('/add/Film', 'AddFilms')->name('add.film');
        Route::post('/store/Film', 'StoreFilm')->name('store.film');
        Route::get('/edit/Film/{id}', 'EditFilm')->name('edit.film');
        Route::post('/update/Film', 'UpdateFilm')->name('update.film');
        Route::post('/update/Film/Poster', 'UpdateFilmPoster')->name('update.film.poster');
        Route::post('/update/Film/SlidePoster', 'UpdateFilmSlidePoster')->name('update.film.slide_poster');
        Route::post('/update/Film/MultiSlika', 'UpdateFilmSlikeFilma')->name('update.film.multiSlika');

        Route::get('/Film/Inactive/{id}', 'FilmInactive')->name('active.film');
        Route::get('/Film/Active/{id}', 'FilmActive')->name('inactive.film');
        Route::get('/delete/Film/{id}', 'DeleteFilm')->name('delete.film');
        
    });

    Route::controller(ProjekcijaController::class)->group(function () {
        Route::get('/add/Projekcija', 'AddProjekcija')->name('add.projekcija');
        Route::post('/store/Projekcija', 'StoreProjekcija')->name('store.projekcija');
        Route::get('/all/Projekcija', 'AllProjekcija')->name('all.projekcija');
        Route::get('/all/Trenutne/Projekcija', 'AllTrenutneProjekcija')->name('all.trenutne.projekcija');
    });
});



// Frontend Film Details Rouute
    Route::get('/', [IndexController::class, 'Index'])->name('pocetna');
    Route::get('/Film/Detalji/{id}', [IndexController::class, 'FilmDetails']);
    Route::get('/Film/All/U-Ponudi', [IndexController::class, 'SviFilmoviUPonudi']);
    Route::get('/Film/All/Uskoro', [IndexController::class, 'SviFilmoviUskoro']);
    Route::get('/Film/All/Zanr/{zanr}', [IndexController::class, 'SviFilmoviZanr']);
    Route::get('/Repertoar', [IndexController::class, 'RepertoarDanas']);
    Route::get('/Repertoar/{datum}/Zanr/{zanr}', [IndexController::class, 'RepertoarZanr']);
    Route::get('/Repertoar/Film/{id}', [IndexController::class, 'RepertoarFilm']);
    Route::get('/Repertoar/Film/{id}/Datum/{datum}', [IndexController::class, 'RepertoarFilmDatum']);
    Route::get('/Projekcija/{id}/OdabirMesta', [IndexController::class, 'ProjekcijaOdabirMesta']);


    Route::middleware(['auth','role:user'])->group(function (){        
        Route::controller(UserController::class)->group(function () {
            Route::post('/Kupovina', 'Kupovina')->name('karte.kupovina');
        });
    });

    Route::middleware(['auth','role:user'])->group(function (){
        Route::controller(StripeController::class)->group(function () {
            Route::post('/stripe/prodaja', 'StripeProdaja')->name('stripe.prodaja');
        });
    });


require __DIR__.'/auth.php';


//Stari Nacin Rutiranje jedan po jedan !--obrisati na kraju--!
// Route::get('Film', [movieController::class, 'getMovies']);
// Route::get('Repertoar', [repertoarController::class, 'getRepertoar']);