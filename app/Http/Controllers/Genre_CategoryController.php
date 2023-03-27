<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\game;
use App\Models\genre;
use App\Models\User;

class Genre_CategoryController extends Controller
{
    public function genre_index(genre $genre)
    {
        return view('genre_categories/genre_index')->with(['genres' => $genre->getBygenre()]);
        //genreの全てのデータをgenre_indexに渡す
    }
}