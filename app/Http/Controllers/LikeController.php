<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Post $post, Request $request){
        //「いいね」をつけるためのlikeメソッド
        $nice=New Like();
        $nice->post_id=$post->id;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }
    
    public function unlike(Post $post, Request $request){
        // 「いいね」を取り消すためのメソッド
        $user=Auth::user()->id;
        $nice=Like::where('post_id', $post->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
