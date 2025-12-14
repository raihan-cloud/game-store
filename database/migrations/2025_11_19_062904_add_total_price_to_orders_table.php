<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // HAPUS bagian ->after('game_id')
            // Jadi kodenya cukup seperti ini:
            $table->decimal('price', 15, 2); 
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Cek dulu: Kalau kolom 'price' ada, baru dihapus
            if (Schema::hasColumn('orders', 'price')) {
                $table->dropColumn('price');
            }
            
            // Cek juga: Kalau ternyata di database masih nama lama ('total_price'), hapus juga
            if (Schema::hasColumn('orders', 'total_price')) {
                $table->dropColumn('total_price');
            }
        });
    }
};