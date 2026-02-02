<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Menyimpan produk baru dan mengaitkannya dengan Admin yang login.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|in:makanan,minuman,bahan-baku',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok_minimal' => 'required|integer|min:1',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Amankan kepemilikan data: ikat ke user_id yang sedang login
        $data['user_id'] = Auth::id();

        // Generate SKU otomatis (Contoh: Makanan -> MAK-17377000)
        $data['sku'] = strtoupper(substr($request->kategori, 0, 3)) . '-' . time();

        // Handle Upload Foto untuk AI Vision
        if ($request->hasFile('foto_produk')) {
            $path = $request->file('foto_produk')->store('products', 'public');
            $data['foto_produk'] = $path;
        }

        Product::create($data);

        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan ke inventori!');
    }

    /**
     * Update data produk & Logika Penambahan Stok.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $product = Product::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|in:makanan,minuman,bahan-baku',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok_minimal' => 'required|integer|min:1',
            'tambah_stok' => 'nullable|integer|min:0',
        ]);

        // Ambil semua data kecuali foto, stok_aktif (karena readonly), dan tambah_stok
        $updateData = $request->except(['foto_produk', 'tambah_stok', 'stok_aktif']);

        // LOGIKA PENAMBAHAN STOK
        // Kita ambil stok saat ini dari DB, bukan dari input form
        $currentStok = $product->stok_aktif;
        if ($request->filled('tambah_stok') && $request->tambah_stok > 0) {
            $updateData['stok_aktif'] = $currentStok + $request->tambah_stok;
        } else {
            // Jika tidak ada penambahan, pastikan nilainya tetap stok yang sekarang (menghindari null)
            $updateData['stok_aktif'] = $currentStok;
        }

        if ($request->hasFile('foto_produk')) {
            if ($product->foto_produk) {
                Storage::disk('public')->delete($product->foto_produk);
            }
            $updateData['foto_produk'] = $request->file('foto_produk')->store('products', 'public');
        }

        $product->update($updateData);

        return redirect()->route('produk')->with('success', 'Data produk dan stok berhasil diperbarui!');
    }

    /**
     * Menghapus produk (hanya milik sendiri).
     */
    public function destroy($id): RedirectResponse
    {
        $product = Product::where('user_id', Auth::id())->findOrFail($id);

        // Hapus foto dari storage agar tidak memenuhi server
        if ($product->foto_produk) {
            Storage::disk('public')->delete($product->foto_produk);
        }

        $product->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus dari inventori.');
    }
}