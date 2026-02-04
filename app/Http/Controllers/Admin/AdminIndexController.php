<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- WAJIB ADA INI
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class AdminIndexController extends Controller
{
    /**
     * Menampilkan Halaman Produk
     */

    public function dashboard(): View
    {
        return view('dashboard');
    }
    public function produk(): View
    {
        // Ambil produk HANYA milik user yang sedang login
        $products = \App\Models\Product::where('user_id', auth()->id())->latest()->get();

        return view('admin.produk', compact('products'));
    }

    /**
     * Menampilkan Halaman Kasir (Daftar User/Staf)
     */
    public function kasir(): View
    {
        // Ambil semua user yang role-nya kasir dan admin_id-nya adalah ID saya
        $cashiers = User::where('admin_id', Auth::id())
            ->where('role', 'kasir')
            ->get();

        return view('admin.kasir', compact('cashiers'));
    }
    /**
     * Menampilkan Halaman Laporan
     */
    public function laporan(): View
    {
        return view('admin.laporan');
    }

    public function setting(): View
    {
        $user = Auth::user();

        // Ambil data pembayaran milik admin yang login
        $payments = \App\Models\PaymentMethod::where('user_id', $user->id)->get();

        return view('admin.setting', compact('user', 'payments'));
    }
    /**
     * Method untuk memproses update identitas toko
     */
    public function updateStore(Request $request): RedirectResponse
    {
        $user = Auth::user();

        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'store_name' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Update ke database
        $user->update([
            'name' => $request->name,
            'store_name' => $request->store_name,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        // Kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Identitas Toko berhasil diperbarui!');
    }

    /**
     * Update password admin
     */
    public function updatePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }
}