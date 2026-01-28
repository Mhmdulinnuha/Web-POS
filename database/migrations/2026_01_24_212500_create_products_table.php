<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('sku')->nullable();
            $table->string('nama_produk');

            $table->enum('kategori', ['makanan', 'minuman', 'bahan-baku']);

            $table->decimal('harga_beli', 15, 2);
            $table->decimal('harga_jual', 15, 2);

            $table->integer('stok_aktif')->default(0);
            $table->integer('stok_minimal')->default(10);

            $table->string('foto_produk')->nullable();

            $table->timestamps();

            $table->unique(['id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
