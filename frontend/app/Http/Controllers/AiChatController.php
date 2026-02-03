<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Untuk agregasi data cepat
use Carbon\Carbon;

class AiChatController extends Controller
{
    public function ask(Request $request)
    {
        $prompt = $request->input('message');
        $apiKey = config('services.gemini.key') ?? env('GEMINI_API_KEY');

        $user = Auth::user();
        $userName = $user->name;
        $userRole = $user->role;
        $storeName = $user->store_name ?? 'Toko Saya';
        $adminId = ($userRole === 'admin') ? $user->id : $user->admin_id;

        // 1. Ambil Statistik Penjualan Global (All-Time)
        $allTimeSales = Transaction::where('user_id', $adminId);
        $totalOmzetAllTime = $allTimeSales->sum('total');
        $totalTransaksiAllTime = $allTimeSales->count();

        // 2. Ambil 5 Produk Terlaris Sepanjang Masa (Top Products)
        $topProducts = Transaction::where('user_id', $adminId)
            ->select('product_id', DB::raw('count(*) as total_terjual'))
            ->groupBy('product_id')
            ->orderBy('total_terjual', 'desc')
            ->limit(5)
            ->with('product')
            ->get()
            ->map(fn($t) => ($t->product->nama_produk ?? 'N/A') . " ({$t->total_terjual}x)")
            ->implode(', ');

        // 3. Data Stok Tetap Disertakan
        $stokInfo = Product::where('user_id', $adminId)
            ->limit(15)
            ->get(['nama_produk', 'stok_aktif'])
            ->map(fn($p) => "{$p->nama_produk}: {$p->stok_aktif}")
            ->implode(', ');

        // 4. Susun Context Global
        $systemContext = "Identitas: Asisten SmartPOS | Toko: {$storeName} | User: {$userName}. " .
                         "PENGETAHUAN SELURUH TRANSAKSI: " .
                         "- Total Omzet Keseluruhan: Rp " . number_format($totalOmzetAllTime, 0, ',', '.') . ". " .
                         "- Total Transaksi Pernah Terjadi: {$totalTransaksiAllTime} kali. " .
                         "- 5 Produk Terlaris Sepanjang Masa: [{$topProducts}]. " .
                         "- Stok Saat Ini: [{$stokInfo}]. " .
                         "Instruksi: Gunakan data historis ini untuk menjawab pertanyaan analisis strategis.";

        try {
            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key=" . $apiKey;
            
            $response = Http::timeout(30)->post($url, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => "{$systemContext}\n\nPertanyaan User: {$prompt}"]
                        ]
                    ]
                ]
            ]);

            $result = $response->json();

            if ($response->failed()) {
                Log::error("Gemini API Error", ['body' => $result]);
                return response()->json(['success' => false, 'reply' => 'Gagal akses AI.'], $response->status());
            }

            $reply = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya gagal memproses jawaban.';

            return response()->json([
                'success' => true,
                'reply' => $reply
            ]);

        } catch (\Exception $e) {
            Log::error("AiChatController Error: " . $e->getMessage());
            return response()->json(['success' => false, 'reply' => 'Kesalahan sistem.'], 500);
        }
    }
}