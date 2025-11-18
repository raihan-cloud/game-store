<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // User yang membuat pesanan
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Total harga (dengan pajak, jika ada)
            $table->decimal('total_amount', 10, 2); 
            
            // Status pesanan: Pending, Paid, Failed, Completed
            $table->enum('status', ['Pending', 'Paid', 'Failed', 'Cancelled', 'Completed'])->default('Pending');
            
            // Metode pembayaran
            $table->string('payment_method')->nullable(); 
            
            // Timestamp pembayaran
            $table->timestamp('paid_at')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};