@extends('layouts.kasir')

@section('content')

    <div class="max-w-7xl mx-auto space-y-6">

        {{-- Welcome --}}
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl p-6 shadow">
            <h3 class="text-lg font-semibold">
                👋 Selamat datang, {{ auth()->user()->name }}
            </h3>
            <p class="text-sm opacity-90">
                Silakan mulai transaksi hari ini
            </p>
        </div>

        {{-- Quick Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-sm text-gray-500">Transaksi Hari Ini</p>
                <p class="text-3xl font-bold text-blue-600">0</p>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-sm text-gray-500">Total Penjualan</p>
                <p class="text-3xl font-bold text-green-600">Rp 0</p>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-sm text-gray-500">Kas Masuk</p>
                <p class="text-3xl font-bold text-indigo-600">Rp 0</p>
            </div>
        </div>

        {{-- Menu Kasir --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-gray-700 mb-4">⚡ Menu Kasir</h3>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex flex-col items-center justify-center p-4 bg-blue-50 rounded-lg opacity-70">
                    🛒
                    <span class="mt-2 text-sm font-medium">Transaksi</span>
                </div>

                <div class="flex flex-col items-center justify-center p-4 bg-green-50 rounded-lg opacity-70">
                    📜
                    <span class="mt-2 text-sm font-medium">Riwayat</span>
                </div>

                <div class="flex flex-col items-center justify-center p-4 bg-yellow-50 rounded-lg opacity-70">
                    📦
                    <span class="mt-2 text-sm font-medium">Produk</span>
                </div>

                <div class="flex flex-col items-center justify-center p-4 bg-red-50 rounded-lg opacity-70">
                    🚪
                    <span class="mt-2 text-sm font-medium">Logout</span>
                </div>
            </div>

            <p class="mt-4 text-sm text-gray-400 italic">
                *Menu akan aktif setelah route & fitur dibuat
            </p>
        </div>

    </div>

@endsection
