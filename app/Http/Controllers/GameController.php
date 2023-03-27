<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\game;
use App\Models\genre;
use App\Models\reply;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LikeController;
use App\Http\Requests\PostRequest;

class GameController extends Controller
{
    public function mypage(Post $post)
    {
        return view('games/mypage')->with(['games' => $post->getPaginateByLimit(3)]);
    }

    public function show(Post $post)
    {
        $like=Like::where('post_id', $post->id)->where('user_id',auth()->user()->id)->first();
         return view('games/show', compact('post', 'like'));
    }
    public function create(game $game, genre $genre)
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
   public function genre_search(genre $genre)
    {
        return view('games/genre_search')->with(['genres' => $genre->get()]);
        //genreのデータをgenre_search.blade.phpに渡す
    }
     public function apex()
    {
        return view('games/apex');
    }
}