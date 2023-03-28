<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\game;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'body',
        'game_id',
        'user_id',
        ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        //投稿にゲーム名も紐づけて表示
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        //投稿にユーザー名も紐づけて表示
    }
    public function game()
    {
        return $this->belongsTo(game::class);
        //gameに対するリレーション
    }
    public function user() {
        return $this->belongsTo(User::class);
        //userに対するリレーション
    }
 
    public function likes() {
        return $this->hasMany(Like::class);
        //likeに対するリレーション
    }
    public function Replies() {
        return $this->hasMany(reply::class);
        //replyに対するリレーション
    }
}