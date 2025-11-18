<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // Foreign key ke tabel orders
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); 
            
            // Game yang dibeli
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            
            // Harga game saat dibeli (PENTING: Harga harus disimpan saat transaksi terjadi)
            $table->decimal('price_at_purchase', 10, 2); 
            
            // Kunci produk yang diberikan ke pengguna. Constraint dihapus di sini.
            $table->foreignId('product_key_id')->nullable(); // <-- Dihapus constrained('product_keys')

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};