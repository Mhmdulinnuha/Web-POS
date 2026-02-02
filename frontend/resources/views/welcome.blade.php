@extends('layouts.app')

@section('title', 'Solusi Kasir Pintar Berbasis AI')

@section('content')

    <section id="hero" class="relative pt-32 pb-20 overflow-hidden bg-white dark:bg-black transition-colors duration-500">
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-blue-500/10 dark:bg-green-500/10 blur-[120px] rounded-full pointer-events-none"></div>
        
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-12 relative z-10">
            <div class="md:w-1/2 space-y-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 dark:bg-gray-800 border border-blue-100 dark:border-gray-700 transition-colors">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 dark:bg-yellow-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500 dark:bg-yellow-500"></span>
                    </span>
                    <span class="text-sm font-bold text-blue-700 dark:text-green-400 uppercase tracking-widest">AI-Powered System v2.0</span>
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 dark:text-white leading-[1.1]">
                    Kelola Bisnis <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400 dark:from-green-400 dark:to-yellow-300">Jauh Lebih Cerdas.</span>
                </h1>

                <p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed max-w-lg">
                    Revolusi sistem kasir dengan teknologi <span class="font-semibold text-slate-800 dark:text-green-400 text-balance">Computer Vision</span>. Deteksi produk otomatis, manajemen stok AI, dan laporan real-time dalam satu genggaman.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#fitur" class="px-8 py-4 bg-blue-700 dark:bg-green-600 text-white dark:text-slate-950 rounded-2xl font-bold shadow-2xl shadow-blue-200 dark:shadow-none hover:-translate-y-1 transition-all text-center">
                        Mulai Sekarang
                    </a>
                    <a href="#" class="px-8 py-4 border-2 border-slate-200 dark:border-gray-700 text-slate-700 dark:text-yellow-400 rounded-2xl font-bold hover:bg-slate-50 dark:hover:bg-gray-800 transition-all text-center">
                        <i class="fas fa-play-circle mr-2"></i> Lihat Demo
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-400 dark:from-green-500 dark:to-yellow-400 rounded-[2.5rem] blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                <div class="relative bg-white dark:bg-gray-900 border border-slate-100 dark:border-gray-700 rounded-[2rem] p-4 shadow-2xl transition-colors">
                    <div class="rounded-[1.5rem] overflow-hidden bg-slate-50 dark:bg-gray-800 aspect-video flex items-center justify-center">
                        <i class="fas fa-microchip text-9xl text-blue-100 dark:text-slate-700 animate-pulse"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kelengkapan" class="py-24 bg-white dark:bg-black border-y border-slate-100 dark:border-gray-800 transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Satu Sistem, Dua Kekuatan</h2>
                <p class="text-slate-500 dark:text-gray-400 max-w-2xl mx-auto text-lg text-balance">Distribusi fitur yang dirancang khusus untuk efisiensi pemilik bisnis dan kenyamanan operasional kasir.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                <div class="group p-10 rounded-[2.5rem] bg-white dark:bg-gray-800 border border-slate-100 dark:border-gray-700 hover:border-blue-300 dark:hover:border-green-500 transition-all shadow-sm">
                    <div class="w-16 h-16 bg-blue-600 dark:bg-green-600 rounded-2xl flex items-center justify-center mb-8 rotate-3 group-hover:rotate-0 transition-transform shadow-xl">
                        <i class="fas fa-chart-pie text-white dark:text-slate-900 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Master Control Admin</h3>
                    <ul class="space-y-4">
                        @foreach(['Insight Penjualan Real-time', 'Manajemen Inventori Cerdas', 'Laporan Pajak & Laba Otomatis', 'Manajemen Multi-Cabang'] as $item)
                        <li class="flex items-center gap-3 text-slate-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-blue-500 dark:text-green-400"></i>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="group p-10 rounded-[2.5rem] bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-700 shadow-xl shadow-slate-100 dark:shadow-none hover:border-yellow-400 transition-all">
                    <div class="w-16 h-16 bg-yellow-400 dark:bg-yellow-400 rounded-2xl flex items-center justify-center mb-8 -rotate-3 group-hover:rotate-0 transition-transform shadow-xl">
                        <i class="fas fa-cash-register text-blue-900 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-yellow-400 mb-6">Front-End Kasir (POS)</h3>
                    <ul class="space-y-4 text-slate-600 dark:text-gray-400">
                        @foreach(['Scan Wajah Login Staf', 'Input Qty Vision AI', 'Integrasi QRIS & E-Wallet', 'Cetak Struk Digital'] as $item)
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-yellow-500 dark:text-green-500"></i>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-24 bg-blue-900 dark:bg-black relative overflow-hidden transition-colors duration-500">
        <div class="absolute inset-0 opacity-10 dark:opacity-30" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 items-center gap-16">
                <div>
                    <h2 class="text-4xl font-bold text-white mb-8 italic">Teknologi <span class="text-yellow-400 dark:text-green-500">Intelligent</span></h2>
                    <div class="space-y-6">
                        <div class="flex gap-6 p-6 rounded-2xl hover:bg-white/5 transition border border-transparent hover:border-white/10">
                            <div class="shrink-0 w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center text-yellow-400 dark:text-green-400">
                                <i class="fas fa-eye text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-2">Computer Vision</h4>
                                <p class="text-blue-100/70 dark:text-gray-400">Sistem mengenali produk secara visual melalui kamera, meminimalisir kesalahan input manual.</p>
                            </div>
                        </div>
                        <div class="flex gap-6 p-6 rounded-2xl hover:bg-white/5 transition border border-white/10">
                            <div class="shrink-0 w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center text-yellow-400 dark:text-green-400">
                                <i class="fas fa-brain text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white mb-2">Predictive Analytics</h4>
                                <p class="text-blue-100/70 dark:text-gray-400">Algoritma ML yang memprediksi kapan stok akan habis dan menyarankan re-order otomatis.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex justify-center">
                    <div class="w-80 h-80 bg-gradient-to-tr from-blue-600 to-yellow-400 dark:from-green-600 dark:to-yellow-500 rounded-full animate-spin-slow opacity-20 blur-3xl absolute"></div>
                    <i class="fas fa-robot text-[12rem] text-white/10 dark:text-green-500/20 transition-colors"></i>
                </div>
            </div>
        </div>
    </section>

    <section id="keuntungan" class="py-24 bg-white dark:bg-black transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Kenapa Smart<span class="text-blue-600 dark:text-green-500">POS</span>?</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $benefits = [
                        ['icon' => 'clock', 'title' => 'Hemat Waktu', 'desc' => 'Checkout 3x lebih cepat dibandingkan sistem konvensional.'],
                        ['icon' => 'shield-alt', 'title' => 'Keamanan Tinggi', 'desc' => 'Log aktivitas lengkap dan otentikasi biometrik untuk staf.'],
                        ['icon' => 'chart-line', 'title' => 'Scale-Up Cepat', 'desc' => 'Cocok untuk UMKM hingga franchise dengan ribuan cabang.']
                    ];
                @endphp

                @foreach($benefits as $b)
                <div class="bg-white dark:bg-gray-900 p-8 rounded-[2rem] border border-slate-200 dark:border-gray-700 hover:shadow-xl transition-all shadow-sm group">
                    <div class="w-12 h-12 flex items-center justify-center text-blue-600 dark:text-yellow-400 text-3xl mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-{{ $b['icon'] }}"></i>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-4">{{ $b['title'] }}</h4>
                    <p class="text-slate-600 dark:text-gray-400 leading-relaxed">{{ $b['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<style>
    .animate-spin-slow { animation: spin 10s linear infinite; }
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>
@endpush