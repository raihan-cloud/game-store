<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', // WAJIB ada
        'title',
        'price',
        'description',
        // Tambahkan field lain yang ada di tabel games Anda
    ];

    // Relasi One-to-One / Many
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Anda bisa menambahkan relasi lain di sini, seperti productKeys()
    public function productKeys()
    {
        return $this->hasMany(ProductKey::class);
    }
}