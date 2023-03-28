<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypost(User $user)
    {
        return view('User/mypost')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
    public function likepost(Like $like)
    {
         return view('User/likepost')->with(['like_posts' => $like->getBylike()]);
    }
}