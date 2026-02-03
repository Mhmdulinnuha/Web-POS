<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KasirIndexController extends Controller
{
    public function dashboardksr(Request $request): View
{
    $kategori = $request->query('kategori');
     $search   = $request->query('search');

    $produks = Product::where('stok_aktif', '>', 0)
        ->when($kategori, function ($query) use ($kategori) {
            $query->where('kategori', $kategori);
        })
         ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        })
        ->get();

    return view('kasir.dashboardksr', compact('produks', 'kategori', 'search'));
}


}
