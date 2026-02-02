@extends('layouts.kasir')

@section('content')
<div class="space-y-6">

    {{-- Welcome & Search Bar --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-black text-[#0d47a1] dark:text-yellow-400 tracking-tight">
                TRANSAKSI PENJUALAN
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Temukan produk atau scan barcode untuk memulai.</p>
        </div>
        
        <div class="relative w-full md:w-96">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-gray-400"></i>
            </span>
            <input type="text" 
                   class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl shadow-sm focus:ring-2 focus:ring-[#0d47a1] focus:border-[#0d47a1] transition-all outline-none" 
                   placeholder="Cari produk (Nama atau SKU)...">
        </div>
    </div>

    {{-- Category Filter --}}
    <div class="flex gap-2 overflow-x-auto pb-2 no-scrollbar">
        <button class="px-6 py-2 rounded-full bg-[#0d47a1] text-white font-bold shadow-md whitespace-nowrap">Semua</button>
        <button class="px-6 py-2 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-gray-600 dark:text-gray-300 hover:border-yellow-400 transition-all whitespace-nowrap">Makanan</button>
        <button class="px-6 py-2 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-gray-600 dark:text-gray-300 hover:border-yellow-400 transition-all whitespace-nowrap">Minuman</button>
        <button class="px-6 py-2 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-gray-600 dark:text-gray-300 hover:border-yellow-400 transition-all whitespace-nowrap">Snack</button>
    </div>

    {{-- Product Grid --}}
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">

@foreach ($produks as $produk)
<div class="group bg-white dark:bg-slate-800 rounded-2xl border border-gray-100 dark:border-slate-700 p-4 shadow-sm hover:shadow-xl hover:border-yellow-400 transition-all cursor-pointer transform hover:-translate-y-1">

    {{-- FOTO PRODUK --}}
    <div class="aspect-square bg-gray-50 dark:bg-slate-900 rounded-xl mb-3 overflow-hidden flex items-center justify-center">
        @if ($produk->foto_produk)
            <img src="{{ asset('storage/' . $produk->foto_produk) }}"
                 alt="{{ $produk->nama_produk }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform">
        @else
            <i class="fas fa-box text-3xl text-gray-300"></i>
        @endif
    </div>

    {{-- INFO PRODUK --}}
    <div class="space-y-1">
        <h4 class="font-bold text-gray-800 dark:text-white text-sm line-clamp-2 leading-tight">
            {{ $produk->nama_produk }}
        </h4>

        <p class="text-[10px] text-gray-400 uppercase font-semibold">
            {{ ucfirst($produk->kategori) }}
        </p>

        <div class="flex justify-between items-center pt-2">
            <span class="text-[#0d47a1] dark:text-yellow-400 font-black text-sm">
                Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
            </span>

            <button
                class="w-8 h-8 bg-gray-100 dark:bg-slate-700 group-hover:bg-yellow-400 group-hover:text-[#0d47a1] rounded-lg flex items-center justify-center transition-colors">
                <i class="fas fa-plus text-xs"></i>
            </button>
        </div>
    </div>

</div>
@endforeach

</div>

</div>
@endsection