<?php

use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\movieController;
use App\Http\Controllers\repertoarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RezervacijaController;
use App\Http\Controllers\ProjekcijaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeCardController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Stripe\StripeController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute za administratora i moderatora
Route::middleware(['auth', 'role:admin|moderator'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dasboard');
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/admin/profile/edit', 'EditProfile')->name('edit.profile');
        Route::post('admin/profile/store', 'StoreProfile')->name('store.profile');
        Route::get('/admin/profile//changePassword', 'ChangePassword')->name('change.password');
        Route::post('/admin/profile/updatePassowrd', 'UpdatePassword')->name('update.password');
        Route::get('/edit/profile/changePassword', 'ChangePassword')->name('change.password');

    });

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::controller(HomeSliderController::class)->group(function () {
            Route::get('/admin/home/slide', 'HomeSlider')->name('home.slide');
            Route::post('/admin/home/slide/update', 'UpdateSlide')->name('update.slide');
        });
        Route::controller(HomeCardController::class)->group(function () {
            Route::get('/admin/home/cards', 'HomeCards')->name('home.cards');
            Route::post('/admin/home/cards/update', 'UpdateCards')->name('update.cards');
        });
        Route::controller(FilmController::class)->group(function () {
            Route::get('/admin/film/add', 'AddFilms')->name('add.film');
            Route::post('/admin/film/store', 'StoreFilm')->name('store.film');
            Route::get('/admin/film/edit/{id}', 'EditFilm')->name('edit.film');
            Route::post('/admin/film/update', 'UpdateFilm')->name('update.film');
            Route::post('/admin/film/update/poster', 'UpdateFilmPoster')->name('update.film.poster');
            Route::post('/admin/film/update/slidePoster', 'UpdateFilmSlidePoster')->name('update.film.slide_poster');
            Route::post('/admin/film/update/multiSlika', 'UpdateFilmSlikeFilma')->name('update.film.multiSlika');

            Route::get('/admin/film/Inactive/{id}', 'FilmInactive')->name('active.film');
            Route::get('/admin/film/Active/{id}', 'FilmActive')->name('inactive.film');
            Route::get('/admin/film/delete/{id}', 'DeleteFilm')->name('delete.film');
        });
        Route::controller(ModeratorController::class)->group(function () {
            Route::get('/admin/moderator/all', 'getAllModerators')->name('all.moderator');
            Route::get('/admin/moderator/edit/{id}', 'editModerator')->name('edit.moderator');
            Route::post('/admin/moderator/Update', 'updateModerator')->name('update.moderator');
            Route::get('/admin/moderator/Delete/{id}', 'deleteModerator')->name('delete.moderator');
            Route::get('/admin/moderator/Add', 'addModerator')->name('add.moderator');
            Route::post('/admin/moderator/Store', 'storeModerator')->name('store.moderator');
        });


    });

    Route::controller(FilmController::class)->group(function () {
        Route::get('/admin/film/all', 'AllFilms')->name('all.film');
        Route::get('/admin/film/all/Aktuelni', 'AktuelniFilmovi')->name('akutelni.film');
        Route::get('/admin/film/all/Uskoro', 'UskoroFilmovi')->name('uskoro.film');
        Route::get('/admin/film/all/Neaktivni', 'NeaktivniFilmovi')->name('neaktivni.film');

    });

    Route::controller(ProjekcijaController::class)->group(function () {
        Route::get('/admin/projekcija/add', 'AddProjekcija')->name('add.projekcija');
        Route::post('/admin/projekcija/store', 'StoreProjekcija')->name('store.projekcija');
        Route::get('/admin/projekcija/all', 'AllProjekcija')->name('all.projekcija');
        Route::get('/admin/projekcija/trenutne/all', 'AllTrenutneProjekcija')->name('all.trenutne.projekcija');
        Route::get('/admin/projekcija/{id}', 'InfoProjekcija')->name('info.projekcija');
        Route::get('/admin/projekcija/izmeni/{id}', 'editProjekcija')->name('edit.projekcija');
        Route::post('/admin/projekcija/update', 'updateProjekcija')->name('update.projekcija');
        Route::get('/admin/projekcija/delete/{id}', 'deleteProjekcija')->name('delete.projekcija');

    });

});

// Rute za registrovanog korisnika
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/Kupovina', 'Kupovina')->name('karte.kupovina');
        Route::post('/Rezervacija', 'Rezervacija')->name('karte.rezervacija');
        Route::get('/Profil', 'UserProfil')->name('user.profil');
        Route::post('/Profil/Update', 'UserProfilUpdate')->name('user.update');
        Route::get("/Rezervacija", "ZavrsenaRezervacija")->name("zavrsena.rezervacija");
        Route::get("/Racun", "ZavrsenRacun")->name("zavrsen.racun");

    });
});

// Rute za neregistrovanog korisnika
Route::get('/', [IndexController::class, 'Index'])->name('pocetna');
Route::get('/Film/Detalji/{id}', [IndexController::class, 'FilmDetails']);
Route::get('/Film/All/U-Ponudi', [IndexController::class, 'sviFilmoviUPonudi']);
Route::get('/Film/All/Uskoro', [IndexController::class, 'SviFilmoviUskoro']);
Route::get('/Film/All/Zanr/{zanr}', [IndexController::class, 'SviFilmoviZanr']);
Route::get('/Repertoar', [IndexController::class, 'RepertoarDanas']);
Route::get('/Repertoar/{datum}/Zanr/{zanr}', [IndexController::class, 'RepertoarZanr']);
Route::get('/Repertoar/Film/{id}', [IndexController::class, 'RepertoarFilm']);
Route::get('/Repertoar/Film/{id}/Datum/{datum}', [IndexController::class, 'RepertoarFilmDatum']);
Route::get('/Projekcija/{id}/OdabirMesta', [IndexController::class, 'ProjekcijaOdabirMesta']);
Route::get('/Novosti', [IndexController::class, 'getNovosti'])->name('novosti');




Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(StripeController::class)->group(function () {
        Route::post('/stripe/prodaja', 'StripeProdaja')->name('stripe.prodaja');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(RezervacijaController::class)->group(function () {
        Route::post('/NovaRezervacija', 'createRezervacija')->name('rezervacija.novaRezervacija');
    });
});


require __DIR__ . '/auth.php';


