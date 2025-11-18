<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Tambahkan kolom category_id, pastikan unsignedBigInteger
            $table->foreignId('category_id')
                  ->nullable() // Game bisa tanpa kategori untuk sementara (opsional)
                  ->constrained() // Membuat foreign key ke tabel 'categories'
                  ->onDelete('set null') // Jika kategori dihapus, game tetap ada tapi category_id-nya jadi NULL
                  ->after('id'); // Posisikan setelah ID
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Hapus foreign key sebelum menghapus kolom
            $table->dropForeign(['category_id']); 
            $table->dropColumn('category_id');
        });
    }
};