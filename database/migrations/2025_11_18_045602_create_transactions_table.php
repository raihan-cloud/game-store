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
       Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            
            // Foreign Keys
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            
            $table->decimal('total_price', 8, 2);
            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending'); // pending, paid, cancelled
            $table->string('reference_code')->unique(); // Kode unik untuk memverifikasi pembayaran
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
