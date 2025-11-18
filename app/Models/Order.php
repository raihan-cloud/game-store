<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // IZINKAN KOLOM INI DIISI OTOMATIS
    protected $fillable = [
        'user_id',
        'game_id',
        'total_price',
        'status',
        'invoice_code',
    ];

    /**
     * Relasi ke User (Pembeli)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Game (Yang Dibeli)
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}