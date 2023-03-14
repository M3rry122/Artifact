<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;
}

public function games()
{
    return $this->hasMany(Post::class);
}

public function users()
{
    return $this->belongsToMany(user::class);
}