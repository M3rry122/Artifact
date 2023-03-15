<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(GameController::class)->middleware(['auth'])->group(function(){
  Route::get('/games/mypage', 'mypage')->name('mypage');
  Route::get('/', 'tweet')->name('tweet');
  Route::post('/games', 'store')->name('store');
  Route::get('/games/genre_search', 'genre_search')->name('genre_search');
  Route::get('/games/fps_tps_select', 'fps_tps_select')->name('fps_tps_select');
  Route::get('/games/create', 'create')->name('create');
  Route::get('/games/{post}', 'show')->name('show');
  Route::put('/games/{post}', 'update')->name('update');
  Route::delete('/games/{post}', 'delete')->name('delete');
  Route::get('/games/{post}/edit', 'edit')->name('edit');
});

Route::get('/categories/{category}', [CategoryController::class,'tweet'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';