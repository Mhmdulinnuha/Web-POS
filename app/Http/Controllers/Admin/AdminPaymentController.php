<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminPaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:bank,ewallet,qris',
            'provider' => 'required|string|max:50',
            'qr_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('qr_image')) {
            $data['qr_image'] = $request->file('qr_image')->store('payments', 'public');
        }

        PaymentMethod::create($data);

        return redirect()->back()->with('success', 'Metode pembayaran berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $payment = PaymentMethod::where('user_id', Auth::id())->findOrFail($id);
        if ($payment->qr_image) {
            Storage::disk('public')->delete($payment->qr_image);
        }
        $payment->delete();
        return redirect()->back()->with('success', 'Metode pembayaran dihapus.');
    }
}