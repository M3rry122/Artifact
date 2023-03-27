<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\game;
use App\Models\genre;
use App\Models\User;

class CategoryController extends Controller
{
    public function game_index(game $game)
    {
        return view('categories/game_index')->with(['games' => $game->getBygame()]);
        //選択されたgameのデータをgame_indexに渡す
    }
    public function genre_index(genre $genre)
    {
        return view('categories/game_index')->with(['genres' => $genre->getBygenre()]);
        //genreの全てのデータをgenre_indexに渡す
    }
}