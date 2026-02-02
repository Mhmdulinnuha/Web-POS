<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'product_id', 'payment_method', 'total', 'transaction_date'];

    protected static function booted()
    {
        // TRIGGER: Saat transaksi dibuat, kurangi stok produk terkait
        static::created(function ($transaction) {
            $product = $transaction->product;
            if ($product) {
                // Menggunakan decrement untuk menghindari race condition
                $product->decrement('stok_aktif', 1); 
                
                // Logika peringatan stok menipis sudah ada di Model Product (booted saving)
                // jadi otomatis akan terpicu saat stok berkurang di sini.
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}