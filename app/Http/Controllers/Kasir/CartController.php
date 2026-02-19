<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:products,id',
            'harga'     => 'required|numeric'
        ]);

        $cart = CartItem::where('user_id', Auth::id())
            ->where('produk_id', $request->produk_id)
            ->first();

        if ($cart) {
            $cart->increment('qty');
        } else {
            CartItem::create([
                'user_id'   => Auth::id(),
                'produk_id' => $request->produk_id,
                'qty'       => 1,
                'harga'     => $request->harga
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produk ditambahkan ke keranjang'
        ]);
    }

    public function data()
{
    $cart = CartItem::where('user_id', Auth::id())
                ->with('product') // WAJIB
                ->get();

    return response()->json($cart);
}

}
