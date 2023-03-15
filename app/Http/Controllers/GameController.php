<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
    public function create()
    {
        return view('games/create');
    }
    public function store(Post $post,PostRequest $request)
    {
         $input = $request['post'];
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
    public function fps_tps_select()
    {
        return view('games/fps_tps_select');
    }
}
