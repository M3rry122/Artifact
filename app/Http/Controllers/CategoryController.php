<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\game;

class CategoryController extends Controller
{
    public function game_index(user $user)
    {
        return view('categories/game_index')->with(['own_posts' => $user->getBygame()]);
        //選択されたgameのデータをgame_indexに渡す
    }
}