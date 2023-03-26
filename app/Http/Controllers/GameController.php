<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\game;
use App\Models\genre;
use App\Models\reply;
use App\Models\Nice;
use App\Http\Requests\PostRequest;

class GameController extends Controller
{
    public function mypage(Post $post)
    {
        return view('games/mypage')->with(['games' => $post->getPaginateByLimit(3)]);
    }
    public function tweet(Post $post)
    {
        return view('games/tweet')->with(['games' => $post->getPaginateByLimit(3)]);
    }
    public function show(Post $post)
    {
        return view('games/show')->with(['post' => $post]);
    }
    public function create(game $game)
    {
        return view('games/create')->with(['games' => $game->get()]);
        //gameのデータをcreate.blade.phpに渡す
    }
    public function store(Post $post,PostRequest $request)
    {
         $input = $request['post'];
         $input += ['user_id' => $request->user()->id];
         $post->fill($input)->save();
         return redirect('/games/' . $post->id);
    }
    public function edit(post $post)
    {
        return view('games/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/games/' . $post->id);
    }
    public function delete(Post $post)
   {
        $post->delete();
        return redirect('/');
   }
   public function genre_search()
    {
        return view('games/genre_search');
    }
    public function fps_tps_select(Post $post)
    {
        return view('games/fps_tps_select')->with(['games' => $post->get()]);
    }
     public function apex()
    {
        return view('games/apex');
    }
    public function game_index(game $game)
    {
        return view('categories/game_index')->with(['posts' => $game->getBygame()]);
        //選択されたgameのデータをgame_indexに渡す
    }
}