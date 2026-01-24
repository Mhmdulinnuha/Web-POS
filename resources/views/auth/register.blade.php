<x-guest-layout>
    <div class="w-full max-w-[1000px] z-10 py-4 sm:py-8 px-4 mx-auto">
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-green-400 font-medium mb-4 transition-all group text-sm">
            <i class="fas fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
            Sudah punya akun? Login di sini
        </a>

        <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl rounded-[2.5rem] shadow-2xl border border-white/50 dark:border-gray-800 transition-all duration-300 overflow-hidden flex flex-col">
            
            <div class="p-8 pb-4 text-center border-b border-slate-100 dark:border-gray-800/50">
                <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Mulai Bisnis Anda</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1 text-sm">Daftarkan toko Anda dan kelola dengan kecerdasan AI.</p>
            </div>

            <div class="overflow-y-auto max-h-[70vh] sm:max-h-none p-6 sm:p-10 custom-scrollbar">
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                        
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xs font-black text-blue-600 dark:text-green-400 uppercase tracking-[0.2em] mb-4 flex items-center gap-2">
                                    <i class="fas fa-user-circle text-lg"></i> Informasi Akun
                                </h3>
                                <div class="space-y-4">
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase ml-1">Nama Lengkap</label>
                                        <input type="text" name="name" :value="old('name')" required class="w-full px-4 py-3.5 bg-white/50 dark:bg-gray-800/50 border border-slate-200 dark:border-gray-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none text-sm dark:text-white transition-all" placeholder="Nama Anda">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase ml-1">Email Aktif</label>
                                        <input type="email" name="email" :value="old('email')" required class="w-full px-4 py-3.5 bg-white/50 dark:bg-gray-800/50 border border-slate-200 dark:border-gray-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none text-sm dark:text-white transition-all" placeholder="email@toko.com">
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase ml-1">Kata Sandi</label>
                                            <input type="password" name="password" required class="w-full px-4 py-3.5 bg-white/50 dark:bg-gray-800/50 border border-slate-200 dark:border-gray-700 rounded-2xl focus:border-blue-600 dark:focus:border-green-500 outline-none text-sm dark:text-white transition-all" placeholder="••••••••">
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase ml-1">Konfirmasi</label>
                                            <input type="password" name="password_confirmation" required class="w-full px-4 py-3.5 bg-white/50 dark:bg-gray-800/50 border border-slate-200 dark:border-gray-700 rounded-2xl focus:border-blue-600 dark:focus:border-green-500 outline-none text-sm dark:text-white transition-all" placeholder="••••••••">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xs font-black text-blue-600 dark:text-green-400 uppercase tracking-[0.2em] mb-4 flex items-center gap-2">
                                    <i class="fas fa-store text-lg"></i> Detail Bisnis & Lokasi
                                </h3>
                                <div class="space-y-4">
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase ml-1">Nama Toko / Usaha</label>
                                        <input type="text" name="store_name" required class="w-full px-4 py-3.5 bg-white/50 dark:bg-gray-800/50 border border-slate-200 dark:border-gray-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none text-sm dark:text-white transition-all" placeholder="Contoh: Kedai Kopi Jaya">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase ml-1">Alamat Lengkap</label>
                                        <textarea name="address" rows="1" required class="w-full px-4 py-3.5 bg-white/50 dark:bg-gray-800/50 border border-slate-200 dark:border-gray-700 rounded-2xl focus:border-blue-600 dark:focus:border-green-500 outline-none text-sm dark:text-white resize-none transition-all" placeholder="Jl. Raya No. 123..."></textarea>
                                    </div>
                                    
                                    <div class="w-full h-40 bg-slate-100 dark:bg-gray-950 rounded-[1.5rem] border-2 border-dashed border-slate-200 dark:border-gray-800 overflow-hidden relative group">
                                        <iframe class="w-full h-full grayscale-[0.6] group-hover:grayscale-0 transition-all duration-500" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126914.28543594734!2d106.78918235!3d-6.2542455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d30079f01%3A0x264101e40a6b7294!2sJakarta%20Selatan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
                                        <div class="absolute inset-0 bg-slate-900/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                            <span class="bg-white dark:bg-slate-900 text-[10px] font-bold px-4 py-2 rounded-full shadow-xl">Klik untuk Pilih Manual</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-slate-100 dark:border-gray-800/50 flex flex-col items-center">
                        <button type="submit" id="btnRegister" class="w-full sm:w-2/3 bg-blue-600 dark:bg-green-600 hover:bg-blue-700 dark:hover:bg-green-500 text-white dark:text-slate-900 py-4 rounded-2xl font-black text-lg shadow-2xl shadow-blue-200 dark:shadow-none transition-all flex items-center justify-center gap-3 active:scale-[0.98]">
                            <span class="loader hidden" id="loader"></span>
                            <span id="btnText">Daftar & Buka Toko</span>
                        </button>
                        <p class="mt-6 text-[10px] text-slate-400 uppercase tracking-[0.2em] text-center">
                            Dengan mendaftar, Anda menyetujui <a href="#" class="text-blue-600 dark:text-green-400 font-bold underline">Syarat & Kebijakan</a> SmartPOS AI.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

@push('scripts')
<style>
    /* Custom Thin Scrollbar */
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; }

    .loader {
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 0.8s ease-in-out infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
</style>
<script>
    // Logic Loading State
    const registerForm = document.getElementById('registerForm');
    const btnRegister = document.getElementById('btnRegister');
    const loader = document.getElementById('loader');
    const btnText = document.getElementById('btnText');

    registerForm.addEventListener('submit', () => {
        btnRegister.style.pointerEvents = 'none';
        btnRegister.style.opacity = '0.7';
        loader.classList.remove('hidden');
        btnText.innerText = 'Menyiapkan Sistem AI...';
    });
</script>
@endpush