<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        // 1. Ambil data kasir (User ID 3 dan 4)
        $cashiers = User::whereIn('id', [3, 4])->get();

        if ($cashiers->isEmpty()) {
            $this->command->warn("User ID 3 atau 4 tidak ditemukan di database. Pastikan User Seeder sudah dijalankan.");
            return;
        }

        $this->command->info("Memulai seeding 1000 transaksi...");

        // 2. Looping 1000 kali untuk membuat transaksi acak
        for ($i = 0; $i < 1000; $i++) {
            // Pilih salah satu kasir secara acak
            $cashier = $cashiers->random();

            /**
             * 3. Ambil produk yang dimiliki oleh Admin dari kasir tersebut.
             * Berdasarkan relasi: kasir memiliki 'admin_id', 
             * dan produk memiliki 'user_id' (yang merupakan ID Admin).
             */
            $product = Product::where('user_id', $cashier->admin_id)
                ->inRandomOrder()
                ->first();

            if ($product) {
                // Buat tanggal acak dalam 30 hari terakhir
                $randomDate = Carbon::now()
                    ->subDays(rand(0, 30))
                    ->subHours(rand(0, 23))
                    ->subMinutes(rand(0, 59));

                Transaction::create([
                    'user_id'          => $cashier->id, // ID Kasir
                    'product_id'       => $product->id,
                    'payment_method'   => collect(['cash', 'transfer'])->random(),
                    'total'            => $product->harga_jual,
                    'transaction_date' => $randomDate,
                    'created_at'       => $randomDate, // Samakan agar laporan akurat
                    'updated_at'       => $randomDate,
                ]);
            }
        }

        $this->command->info("1000 Transaksi berhasil dibuat!");
    }
}