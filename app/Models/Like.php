<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use Auth;

class Like extends Model
{
    use HasFactory;
    
    
     protected $fillable = [
        'user_id',
        'post_id',
    ];
     public function getBylike(int $limit_count = 5)
{
    return $this->post()->with('like')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
    
    public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
