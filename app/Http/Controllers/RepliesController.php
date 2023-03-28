<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Http\Models\Reply;

class RepliesController extends Controller
{
     public function store(ReplyRequest $request)
    {
        $savedata = [
            'post_id' => $request->post_id,
            'name' => $request->name,
            'body' => $request->body,
        ];
 
        $request = new Reply;
        $request->fill($savedata)->save();
 
        return redirect()->route('games/show2', [$savedata['post_id']])->with('replies','コメントを投稿しました');
    }
}
