<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function tweet(Post $post)
    {
        return view('posts/tweet')->with(['posts' => $post->getPaginateByLimit(3)]);
    }
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    public function create()
    {
        return view('posts/create');
    }
    public function store(Post $post,PostRequest $request)
    {
         $input = $request['post'];
         $post->fill($input)->save();
         return redirect('/posts/' . $post->id);
    }
    public function edit(post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
}
