<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\game;

class genre extends Model
{
    use HasFactory;
    
     protected $fillable = [
    'title'
];  
    
    public function games()
    {
    return $this->hasMany(game::class);
    //gameに対するリレーション
    }
    
    public function getBygenre(int $limit_count = 5)
    {
     return $this->games()->with('genre')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
