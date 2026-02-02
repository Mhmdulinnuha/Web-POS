<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $adminId = Auth::id();
        
        // DEFAULT: Hari Ini (Start of Day)
        // Jika ada input 'start_date', gunakan itu. Jika tidak, gunakan Carbon::today()
        $startDate = $request->filled('start_date') 
            ? Carbon::parse($request->start_date)->startOfDay() 
            : Carbon::today(); // Jam 00:00:00 hari ini
            
        // Jika ada input 'end_date', gunakan itu. Jika tidak, gunakan Carbon::now()
        $endDate = $request->filled('end_date') 
            ? Carbon::parse($request->end_date)->endOfDay() 
            : Carbon::now(); // Jam sekarang

        // 1. Ambil ID semua kasir yang terhubung dengan Admin ini
        $cashierIds = User::where('admin_id', $adminId)->pluck('id');

        // 2. Jumlah jenis barang keseluruhan milik admin
        $totalProduk = Product::where('user_id', $adminId)->count();

        // 3. Barang terjual dalam rentang tanggal (Default: hari ini)
        $terjualDalamPeriode = Transaction::whereIn('user_id', $cashierIds)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        // 4. Total uang masuk dalam rentang tanggal (Default: hari ini)
        $uangMasukPeriode = Transaction::whereIn('user_id', $cashierIds)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total');

        // 5. Total uang masuk keseluruhan (All time)
        $totalUangMasuk = Transaction::whereIn('user_id', $cashierIds)->sum('total');

        // 6. Seluruh transaksi dalam rentang tanggal
        $allTransactions = Transaction::with(['product', 'user'])
            ->whereIn('user_id', $cashierIds)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->latest()
            ->get();

        return view('admin.laporan', compact(
            'totalProduk',
            'terjualDalamPeriode',
            'uangMasukPeriode',
            'totalUangMasuk',
            'allTransactions',
            'startDate',
            'endDate'
        ));
    }
}