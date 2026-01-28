<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        // Primary Key Utama
        $table->id();
        
        // Relasi ke Pemilik (Admin)
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        // Detail Barang
        $table->string('sku')->nullable();
        $table->string('nama_produk');
        $table->enum('kategori', ['makanan', 'minuman', 'bahan-baku']);
        $table->decimal('harga_beli', 15, 2);
        $table->decimal('harga_jual', 15, 2);
        
        // Stok & Threshold
        $table->integer('stok_aktif')->default(0);
        $table->integer('stok_minimal')->default(10); // Threshold Alert
        
        $table->string('foto_produk')->nullable();
        $table->timestamps();

        // Memastikan ID barang unik dalam lingkup user tersebut
        $table->unique(['id', 'user_id']); 
    });
}
};
