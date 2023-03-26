<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\game;
use App\Models\Post;

class game extends Model
{
    use HasFactory;

    public function posts()
    {
    return $this->hasMany(Post::class);
    //postに対するリレーション
    }
    
    public function genre()
    {
        return $this->belongsTo(genre::class);
        //genreに対するリレーション
    }
    
    public function getBygame(int $limit_count = 5)
    {
     return $this->posts()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
     //$thisには選択されたgameのインスタンスが入り、そのgameが持つ投稿を呼び出す
    }
}