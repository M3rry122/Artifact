<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Genre_CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Models\Post;
use App\Http\Models\User;
use App\Http\Models\game;
use App\Http\Models\genre;
use App\Http\Models\Like;

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
  Route::get('/games/apex', 'apex')->name('apex');
  Route::get('/games/create', 'create')->name('create');
  Route::get('/games/{post}', 'show')->name('show');
  Route::put('/games/{post}', 'update')->name('update');
  Route::delete('/games/{post}', 'delete')->name('delete');
  Route::get('/games/{post}/edit', 'edit')->name('edit');
});

Route::controller(Genre_CategoryController::class)->middleware(['auth'])->group(function(){
    Route::get('/genre_categories/{genre}', 'genre_index')->name('genre_index');
});

Route::controller(CategoryController::class)->middleware(['auth'])->group(function(){
    Route::get('/categories/{game}','game_index')->name('game_index');
    //   /categories/{game}にgetリクエストが来たらCategoryControllerのgame_indexメソッドを呼び出す
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/User','mypost')->name("mypost");
//   /Userにgetリクエストが来た際、UserControllerのmypostメソッド呼び出す
});

// いいねボタン
Route::controller(LikeController::class)->middleware(['auth'])->group(function(){
Route::get('/like/{post}', 'like')->name('like');
//   /likeにgetリクエストが来た際、LikeControllerのlikeメソッド呼び出す
Route::get('/unlike/{post}', 'unlike')->name('unlike');
//   /likeにgetリクエストが来た際、LikeControllerのunlikeメソッド呼び出す
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';