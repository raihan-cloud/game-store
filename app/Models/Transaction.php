<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'total_price',
        'payment_method',
        'status',
        'reference_code',
    ];

    // Definisikan relasi ke User dan Game
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
