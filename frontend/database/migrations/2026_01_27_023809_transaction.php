<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke Kasir (User)
            // Menggunakan constrained ke table users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Relasi ke Produk
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            
            // Metode Bayar (Bisa string atau relasi ke tabel payment_methods)
            $table->string('payment_method'); // Contoh: 'cash', 'transfer'
            
            $table->decimal('total', 15, 2); // Menggunakan decimal untuk akurasi uang
            $table->timestamp('transaction_date')->useCurrent();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};