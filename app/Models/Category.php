<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Izinkan field name dan description untuk mass assignment
    protected $fillable = [
        'name',
        'description',
    ];
    
    // Tambahkan relasi ke Game
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}