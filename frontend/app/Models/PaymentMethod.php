<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    // Pastikan tidak ada karakter aneh di atas baris ini
    protected $fillable = [
        'user_id', 
        'type', 
        'provider', 
        'account_name', 
        'account_number', 
        'qr_image', 
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}