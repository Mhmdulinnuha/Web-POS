<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
protected $fillable = [
    'user_id',
    'produk_id',
    'qty',
    'harga'
];

public function product()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }
}
