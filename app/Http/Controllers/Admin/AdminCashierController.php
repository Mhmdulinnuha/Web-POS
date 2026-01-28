<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminCashierController extends Controller
{
    /**
     * Menyimpan data kasir baru yang dibuat oleh Admin.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|string|min:8',
            'employee_id' => 'required|string|max:50|unique:users',
        ]);

        User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => 'kasir',
            'admin_id'    => Auth::id(), // Mengikat kasir ke Admin yang login
            'employee_id' => $request->employee_id,
            'status'      => 'aktif',
        ]);

        return redirect()->route('kasir')->with('success', 'Staff Kasir baru berhasil didaftarkan!');
    }

    /**
     * Mengupdate status atau data kasir.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Pastikan Admin hanya bisa mengedit kasir miliknya sendiri
        $cashier = User::where('admin_id', Auth::id())->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        // Update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $cashier->update($data);

        return redirect()->back()->with('success', 'Data kasir berhasil diperbarui.');
    }

    /**
     * Menghapus akun kasir.
     */
    public function destroy($id): RedirectResponse
    {
        $cashier = User::where('admin_id', Auth::id())->findOrFail($id);
        $cashier->delete();

        return redirect()->back()->with('success', 'Akun kasir telah dihapus.');
    }
}