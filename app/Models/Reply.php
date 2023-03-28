<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    
     protected $fillable = [
     'post_id',
     'name',
     'body', 
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
        //Userに対するリレーション
    }
    
     public function post() {
        return $this->belongsTo(Post::class);
        //Postに対するリレーション
    }
}
