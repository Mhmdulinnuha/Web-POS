<x-guest-layout>
    <div class="h-screen w-full flex items-center justify-center bg-slate-50 dark:bg-slate-950 overflow-hidden transition-colors duration-500">
        
        <div class="w-full h-full lg:h-[90vh] lg:max-w-6xl lg:px-6 z-10 flex flex-col">

            <div class="flex-1 bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl 
                        sm:rounded-[2.5rem] shadow-2xl border-white dark:border-slate-800 
                        overflow-hidden flex flex-col lg:flex-row transition-all border">
                
                {{-- SISI KIRI: Branding --}}
                <div class="hidden lg:flex lg:w-4/12 bg-blue-600 dark:bg-green-600 p-10 flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-rocket text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-black text-white leading-tight">Mulai Bisnis <br>Cerdas Anda.</h2>
                        <p class="text-blue-100 dark:text-slate-900/60 mt-4 text-sm font-medium">Satu platform untuk kelola toko, inventaris, dan pelanggan dengan bantuan AI.</p>
                    </div>
                    <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-white/10 rounded-full blur-[80px]"></div>
                </div>

                {{-- SISI KANAN: Form (2 Kolom di PC) --}}
                <div class="flex-1 flex flex-col h-full bg-white dark:bg-slate-900 overflow-hidden">
                    
                    <div class="px-8 pt-6 flex justify-between items-center">
                        <a href="{{ route('login') }}" class="text-slate-400 hover:text-blue-600 transition-all"><i class="fas fa-arrow-left text-xl"></i></a>
                        <span class="text-[9px] font-black text-slate-300 dark:text-slate-700 uppercase tracking-widest">SmartPOS Setup</span>
                    </div>

                    <div class="flex-1 px-8 lg:px-12 py-6 overflow-y-auto custom-scrollbar">
                        <form method="POST" action="{{ route('register') }}" id="registerForm" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-6">
                                {{-- KOLOM 1: AKUN --}}
                                <div class="space-y-4">
                                    <h3 class="text-[10px] font-black text-blue-600 dark:text-green-400 uppercase tracking-widest flex items-center gap-2">
                                        <i class="fas fa-user-circle"></i> Informasi Akun
                                    </h3>
                                    <div class="space-y-3">
                                        <input type="text" name="name" placeholder="Nama Pemilik" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl text-sm dark:text-white outline-none focus:border-blue-600 transition-all">
                                        <input type="email" name="email" placeholder="Email Bisnis" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl text-sm dark:text-white outline-none focus:border-blue-600 transition-all">
                                        <input type="password" name="password" placeholder="Kata Sandi" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl text-sm dark:text-white outline-none focus:border-blue-600 transition-all">
                                        <input type="password" name="password_confirmation" placeholder="Ulangi Sandi" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl text-sm dark:text-white outline-none focus:border-blue-600 transition-all">
                                    </div>
                                </div>

                                {{-- KOLOM 2: TOKO & MAP --}}
                                <div class="space-y-4">
                                    <h3 class="text-[10px] font-black text-blue-600 dark:text-green-400 uppercase tracking-widest flex items-center gap-2">
                                        <i class="fas fa-store"></i> Detail Toko & Lokasi
                                    </h3>
                                    <div class="space-y-3">
                                        <input type="text" name="store_name" placeholder="Nama Toko" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl text-sm dark:text-white outline-none focus:border-blue-600 transition-all">
                                        
                                        {{-- Google Maps Area --}}
                                        <div class="w-full h-32 bg-slate-100 dark:bg-slate-950 rounded-2xl border-2 border-dashed border-slate-200 dark:border-slate-800 overflow-hidden relative group">
                                            <iframe class="w-full h-full grayscale group-hover:grayscale-0 transition-all" src="https://maps.google.com/maps?q=-6.2088,106.8456&z=15&output=embed"></iframe>
                                            <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                                <span class="bg-white text-[9px] font-bold px-3 py-1 rounded-full shadow-lg">Klik untuk Pinpoint</span>
                                            </div>
                                        </div>
                                        <textarea name="address" rows="1" placeholder="Alamat Lengkap Toko" class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl text-sm dark:text-white outline-none focus:border-blue-600 transition-all resize-none"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col items-center pt-4">
                                <button type="submit" id="btnRegister" class="w-full lg:w-1/2 bg-blue-600 dark:bg-green-600 hover:bg-blue-700 dark:hover:bg-green-500 text-white dark:text-slate-900 py-4 rounded-2xl font-black text-base transition-all shadow-xl shadow-blue-200 dark:shadow-none flex items-center justify-center gap-3 active:scale-95">
                                    <span class="hidden w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin" id="loader"></span>
                                    <span id="btnText">Daftar Sekarang</span>
                                </button>
                                
                                <div class="grid grid-cols-2 gap-4 mt-6 w-full lg:w-1/2">
                                    <button type="button" class="flex items-center justify-center gap-2 py-2 bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-xl text-[11px] font-bold text-slate-600 dark:text-slate-300 shadow-sm"><img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" class="w-3 h-3"> Google</button>
                                    <button type="button" class="flex items-center justify-center gap-2 py-2 bg-[#25D366] rounded-xl text-[11px] font-bold text-white shadow-sm"><i class="fab fa-whatsapp"></i> WhatsApp</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="p-6 border-t border-slate-50 dark:border-slate-800/50 text-center">
                        <p class="text-xs text-slate-500 dark:text-slate-400">Sudah punya akun? <a href="{{ route('login') }}" class="font-black text-blue-600 dark:text-green-400 hover:underline">Masuk Sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>