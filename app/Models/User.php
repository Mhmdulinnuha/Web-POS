<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'admin_id',
        'employee_id',
        'status',
        'store_name',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     * * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Seorang Admin memiliki banyak produk
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function cashiers()
    {
        return $this->hasMany(User::class, 'admin_id');
    }

    /**
     * Relasi: Kasir dimiliki oleh satu Admin
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }
}