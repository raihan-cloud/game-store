<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Menambahkan kolom game_id setelah user_id
            // constrained() otomatis menjadikannya Foreign Key ke tabel games
            // onDelete('cascade') berarti jika game dihapus, ordernya juga terhapus (opsional)
            $table->foreignId('game_id')->after('user_id')->constrained('games')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Hapus foreign key dan kolomnya jika rollback
            $table->dropForeign(['game_id']);
            $table->dropColumn('game_id');
        });
    }
};