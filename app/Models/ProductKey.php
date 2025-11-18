<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKey extends Model
{
    use HasFactory;

    // Definisikan kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'game_id',
        'key_value', // Nilai kunci (misal: serial number)
        'is_used',   // Status penggunaan (true/false)
        'order_item_id', // ID item pesanan yang menggunakan kunci ini (bisa NULL)
    ];
    
    // Relasi: Kunci produk ini milik Game mana
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    // Relasi: Kunci produk ini dialokasikan ke Item Pesanan mana
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }
}