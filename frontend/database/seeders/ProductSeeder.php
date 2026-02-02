<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [1, 2];

        foreach ($users as $userId) {
            $products = [
                [
                    'nama_produk' => 'Kopi Gayo Arabica',
                    'kategori'    => 'minuman',
                    'harga_beli'  => 50000,
                    'harga_jual'  => 75000,
                    'stok_aktif'   => 20,
                ],
                [
                    'nama_produk' => 'Sandwich Gandum',
                    'kategori'    => 'makanan',
                    'harga_beli'  => 15000,
                    'harga_jual'  => 25000,
                    'stok_aktif'   => 15,
                ],
                [
                    'nama_produk' => 'Susu Bubuk Vanilla',
                    'kategori'    => 'bahan-baku',
                    'harga_beli'  => 80000,
                    'harga_jual'  => 95000,
                    'stok_aktif'   => 5, // Di bawah minimal (10) untuk testing alert
                ],
                [
                    'nama_produk' => 'Teh Hijau Melati',
                    'kategori'    => 'minuman',
                    'harga_beli'  => 10000,
                    'harga_jual'  => 18000,
                    'stok_aktif'   => 50,
                ],
                [
                    'nama_produk' => 'Roti Bakar Cokelat',
                    'kategori'    => 'makanan',
                    'harga_beli'  => 12000,
                    'harga_jual'  => 20000,
                    'stok_aktif'   => 12,
                ],
            ];

            foreach ($products as $p) {
                Product::create([
                    'user_id'      => $userId,
                    'sku'          => strtoupper(substr($p['kategori'], 0, 3)) . '-' . rand(1000, 9999),
                    'nama_produk'  => $p['nama_produk'] . ' (User ' . $userId . ')',
                    'kategori'     => $p['kategori'],
                    'harga_beli'   => $p['harga_beli'],
                    'harga_jual'   => $p['harga_jual'],
                    'stok_aktif'   => $p['stok_aktif'],
                    'stok_minimal' => 10,
                    'foto_produk'  => null,
                ]);
            }
        }
    }
}