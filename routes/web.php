<?php

use App\Http\Controllers\movieController;
use App\Http\Controllers\repertoarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('home');
});


// Grupisanje Kontrolera Radi Laksesg rutiranja
Route::controller(movieController::class)->group(function (){
    Route::get('Film','getMovies');
});

Route::controller(repertoarController::class)->group(function (){
    Route::get('Repertoar','getRepertoar');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
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


Route::controller(FilmController::class)->group(function () {
    Route::get('/all/Film', 'AllFilms')->name('all.film');
    Route::get('/add/Film', 'AddFilms')->name('add.film');
    Route::post('/store/Film', 'StoreFilm')->name('store.film');
    

 
});

require __DIR__.'/auth.php';


//Stari Nacin Rutiranje jedan po jedan !--obrisati na kraju--!
// Route::get('Film', [movieController::class, 'getMovies']);
// Route::get('Repertoar', [repertoarController::class, 'getRepertoar']);