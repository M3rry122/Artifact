<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Models\User;


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
    return view('auth/login');
});
   

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(GameController::class)->middleware(['auth'])->group(function(){
  Route::get('/games/mypage', 'mypage')->name('mypage');
  Route::post('/games', 'store')->name('store');
  Route::get('/games/genre_search', 'genre_search')->name('genre_search');
  Route::get('/games/fps_tps_select', 'fps_tps_select')->name('fps_tps_select');
  Route::get('/games/apex', 'apex')->name('apex');
  Route::get('/games/create', 'create')->name('create');
  Route::get('/games/{post}', 'show')->name('show');
  Route::put('/games/{post}', 'update')->name('update');
  Route::delete('/games/{post}', 'delete')->name('delete');
  Route::get('/games/{post}/edit', 'edit')->name('edit');
});

Route::get('/categories/{game}', [CategoryController::class,'game_index'])->middleware("auth");
//   /categories/{game}にgetリクエストが来たらCategoryControllerのgame_indexメソッドを呼び出す

Route::get('/User', [UserController::class,'mypost'])->middleware("auth");
//   /Userにgetリクエストが来た際、UserControllerのmypostメソッド呼び出す
Route::get('/User', [UserController::class, 'mypost'])->middleware("auth")->name('mypost');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';