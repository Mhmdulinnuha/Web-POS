<x-guest-layout>
    {{-- Wrapper: Mengunci layar tepat di 100vh --}}
    <div class="h-screen w-full flex items-center justify-center bg-slate-50 dark:bg-slate-950 overflow-hidden transition-colors duration-500">
        
        {{-- Kontainer: Menyesuaikan Lebar PC vs HP --}}
        <div class="w-full h-full lg:h-[90vh] lg:max-w-5xl lg:px-6 z-10 flex flex-col">

            {{-- Card Utama: 100vh di HP, Proposional di PC --}}
            <div class="flex-1 bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl 
                        sm:rounded-[2.5rem] shadow-2xl border-white dark:border-slate-800 
                        overflow-hidden flex flex-col lg:flex-row transition-all border">
                
                {{-- SISI KIRI: Branding Visual (Hanya PC - Landscape) --}}
                <div class="hidden lg:flex lg:w-5/12 bg-blue-600 dark:bg-green-600 p-12 flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-store text-white text-3xl"></i>
                        </div>
                        <h2 class="text-4xl font-black text-white leading-[1.1]">
                            Kelola Bisnis <br> Jadi Lebih <br> <span class="text-yellow-400 dark:text-slate-900">Cerdas.</span>
                        </h2>
                        <p class="text-blue-100 dark:text-slate-900/60 mt-6 font-medium leading-relaxed">
                            Akses dashboard SmartPOS Anda untuk pantau transaksi dan stok secara real-time.
                        </p>
                    </div>
                    
                    <div class="relative z-10 pt-8 border-t border-white/20 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center text-blue-900 shadow-lg">
                            <i class="fas fa-robot"></i>
                        </div>
                        <span class="text-xs text-white font-bold uppercase tracking-widest">AI-Powered System v2.0</span>
                    </div>

                    {{-- Background Decoration --}}
                    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-white/10 rounded-full blur-[100px]"></div>
                </div>

                {{-- SISI KANAN: Form Utama (Full 100vh di HP) --}}
                <div class="flex-1 flex flex-col h-full bg-white dark:bg-slate-900">
                    
                    {{-- Header Form dengan Tombol Kembali --}}
                    <div class="px-8 pt-8 sm:pt-10 flex justify-between items-center">
                        <a href="/" class="text-slate-400 dark:text-slate-500 hover:text-blue-600 dark:hover:text-green-400 transition-all">
                            <i class="fas fa-arrow-left text-xl"></i>
                        </a>
                        <span class="text-[10px] font-black text-slate-300 dark:text-slate-700 uppercase tracking-[0.3em]">SmartPOS Login</span>
                    </div>

                    {{-- Area Form yang bisa di-scroll jika layar sangat kecil --}}
                    <div class="flex-1 px-8 sm:px-14 py-6 overflow-y-auto custom-scrollbar flex flex-col justify-center">
                        <div class="mb-10">
                            <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Selamat Datang</h1>
                            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">Silakan masuk untuk melanjutkan operasional.</p>
                        </div>

                        <x-auth-session-status class="mb-6" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-6">
                            @csrf
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest ml-1">Email Karyawan</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition">
                                        <i class="fas fa-envelope text-sm"></i>
                                    </div>
                                    <input type="email" name="email" value="{{ old('email') }}" required 
                                        class="w-full pl-11 pr-4 py-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" 
                                        placeholder="nama@smartpos.com">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <div class="space-y-2">
                                <div class="flex justify-between items-center ml-1">
                                    <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Kata Sandi</label>
                                    <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-blue-600 dark:text-green-400 hover:underline">Lupa?</a>
                                </div>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition">
                                        <i class="fas fa-lock text-sm"></i>
                                    </div>
                                    <input type="password" name="password" id="password" required 
                                        class="w-full pl-11 pr-12 py-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" 
                                        placeholder="••••••••">
                                    <button type="button" id="togglePasswordBtn" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                                        <i id="eyeIcon" class="fas fa-eye text-sm"></i>
                                    </button>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>

                            <button type="submit" id="btnLogin" 
                                    class="w-full bg-blue-600 dark:bg-green-600 hover:bg-blue-700 dark:hover:bg-green-500 text-white dark:text-slate-900 py-4 rounded-2xl font-black text-base transition-all flex items-center justify-center gap-3 shadow-xl shadow-blue-200 dark:shadow-none active:scale-95">
                                <span class="hidden w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin" id="loader"></span>
                                <span id="btnText">Masuk Sekarang</span>
                            </button>
                        </form>

                        <div class="flex items-center gap-4 my-8">
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800"></div>
                            <span class="text-[9px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">Akses Cepat</span>
                            <div class="flex-1 h-px bg-slate-100 dark:bg-slate-800"></div>
                        </div>

                        {{-- Social Login: Dibuat lebih kecil & proporsional --}}
                        <div class="grid grid-cols-2 gap-4">
                            <button type="button" class="flex items-center justify-center gap-2 py-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl hover:shadow-md transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                                <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" class="w-4 h-4" alt="Google">
                                Google
                            </button>
                            <button type="button" class="flex items-center justify-center gap-2 py-3 bg-[#25D366] hover:bg-[#20bd5c] rounded-2xl transition-all shadow-sm text-sm font-bold text-white">
                                <i class="fab fa-whatsapp text-lg"></i>
                                WhatsApp
                            </button>
                        </div>
                    </div>

                    {{-- Footer Form --}}
                    <div class="p-8 border-t border-slate-50 dark:border-slate-800/50 text-center">
                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            Belum punya akses? <a href="{{ route('register') }}" class="font-black text-blue-600 dark:text-green-400 hover:underline">Daftar Akun</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

@push('scripts')
<style>
    /* Custom Thin Scrollbar */
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; }
</style>
@endpush