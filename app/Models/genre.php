<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\game;

class genre extends Model
{
    use HasFactory;
    
     public function games()
    {
    return $this->hasMany(game::class);
    //gameに対するリレーション
    }
}
