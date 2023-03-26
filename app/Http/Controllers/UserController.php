<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypost(User $user)
    {
        return view('User/mypost')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
}