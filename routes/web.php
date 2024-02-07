<?php

use App\Http\Controllers\movieController;
use App\Http\Controllers\repertoarController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Stari Nacin Rutiranje jedan po jedan !--obrisati na kraju--!
// Route::get('Film', [movieController::class, 'getMovies']);
// Route::get('Repertoar', [repertoarController::class, 'getRepertoar']);