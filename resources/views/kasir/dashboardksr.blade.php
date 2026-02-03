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
@php
    $kategoriAktif = $kategori ?? null;
@endphp

<div class="flex gap-2 overflow-x-auto pb-2 no-scrollbar">

    {{-- Semua --}}
    <a href="{{ route('kasir.dashboardksr') }}"
       class="px-6 py-2 rounded-full font-bold whitespace-nowrap
       {{ !$kategoriAktif ? 'bg-[#0d47a1] text-white shadow-md' : 'bg-white border text-gray-600' }}">
        Semua
    </a>

    {{-- Makanan --}}
    <a href="{{ route('kasir.dashboardksr', ['kategori' => 'makanan']) }}"
       class="px-6 py-2 rounded-full font-bold whitespace-nowrap
       {{ $kategoriAktif === 'makanan' ? 'bg-[#0d47a1] text-white shadow-md' : 'bg-white border text-gray-600' }}">
        Makanan
    </a>

    {{-- Minuman --}}
    <a href="{{ route('kasir.dashboardksr', ['kategori' => 'minuman']) }}"
       class="px-6 py-2 rounded-full font-bold whitespace-nowrap
       {{ $kategoriAktif === 'minuman' ? 'bg-[#0d47a1] text-white shadow-md' : 'bg-white border text-gray-600' }}">
        Minuman
    </a>

    {{-- Bahan Baku --}}
    <a href="{{ route('kasir.dashboardksr', ['kategori' => 'bahan-baku']) }}"
       class="px-6 py-2 rounded-full font-bold whitespace-nowrap
       {{ $kategoriAktif === 'bahan-baku' ? 'bg-[#0d47a1] text-white shadow-md' : 'bg-white border text-gray-600' }}">
        Bahan Baku
    </a>

</div>




    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
    @forelse ($produks as $produk)
        <div class="group bg-white dark:bg-slate-800 rounded-2xl p-4 shadow-sm hover:shadow-xl">
            <div class="aspect-square bg-gray-50 rounded-xl mb-3 flex items-center justify-center">
                <i class="fas fa-box text-3xl text-gray-300"></i>
            </div>

            <h4 class="font-bold text-sm">{{ $produk->nama_produk }}</h4>
            <p class="text-[10px] uppercase">{{ $produk->kategori }}</p>

            <div class="flex justify-between items-center pt-2">
                <span class="font-black text-sm">
                    Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                </span>
                <button class="w-8 h-8 bg-gray-100 rounded-lg">
                    <i class="fas fa-plus text-xs"></i>
                </button>
            </div>
        </div>
    @empty
        <p class="col-span-full text-center text-gray-400">
            Produk tidak ditemukan
        </p>
    @endforelse
</div>


</div>
@endsection