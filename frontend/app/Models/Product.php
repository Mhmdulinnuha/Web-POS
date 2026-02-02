<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'sku', 'nama_produk', 'kategori', 
        'harga_beli', 'harga_jual', 'stok_aktif', 
        'stok_minimal', 'foto_produk'
    ];

    /**
     * Relasi: Produk dimiliki oleh satu User (Admin)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * TRIGGER: Logika otomatis saat data disimpan/diupdate
     */
    protected static function booted()
    {
        static::saving(function ($product) {
            // Logika Trigger: Cek jika stok di bawah minimal
            if ($product->stok_aktif <= $product->stok_minimal) {
                // Di sini Anda bisa memicu Notifikasi AI atau Log sistem
                Log::warning("Barang '{$product->nama_produk}' milik User ID {$product->user_id} menipis! Stok: {$product->stok_aktif}");
                
                // Contoh: Anda bisa menambahkan flag status_alert jika ada kolomnya
            }
        });
    }
}