<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Pastikan 'qty' masuk di sini agar bisa disimpan ke database
    protected $fillable = [
        'user_id', 
        'product_id', 
        'payment_method', 
        'total', 
        'transaction_date', 
        'qty'
    ];

    protected static function booted()
    {
        // Hanya satu fungsi booted untuk semua event
        static::created(function ($transaction) {
            $product = $transaction->product;
            
            if ($product) {
                // AMBIL QTY DINAMIS: Kurangi stok berdasarkan jumlah yang dibeli.
                // Jika qty kosong (null), default ke 1 agar tidak error.
                $jumlahDibelinya = $transaction->qty ?? 1;
                
                $product->decrement('stok_aktif', $jumlahDibelinya);
                
                // Info: Trigger peringatan stok di Model Product 
                // otomatis jalan karena ada proses update di sini.
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