<x-guest-layout>
    {{-- Wrapper utama: 100vh Fullscreen --}}
    <div class="h-screen w-full flex items-center justify-center bg-slate-50 dark:bg-slate-950 overflow-hidden transition-colors duration-500">
        
        {{-- Kontainer --}}
        <div class="w-full h-full lg:h-[85vh] lg:max-w-5xl lg:px-6 z-10 flex flex-col justify-center">

            {{-- Card Utama --}}
            <div class="flex-1 lg:flex-none lg:h-full bg-white dark:bg-slate-900 
                        sm:rounded-[2.5rem] shadow-2xl border-white dark:border-slate-800 
                        overflow-hidden flex flex-col lg:flex-row transition-all border relative">

                {{-- SISI KIRI: Visual Branding (PC Landscape) --}}
                <div class="hidden lg:flex lg:w-5/12 bg-blue-600 dark:bg-green-600 p-12 flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8">
                            <i class="fas fa-user-shield text-white text-3xl"></i>
                        </div>
                        <h2 class="text-4xl font-black text-white leading-[1.1]">
                            Amankan <br> Kembali <br> <span class="text-yellow-400 dark:text-slate-900">Akun Anda.</span>
                        </h2>
                        <p class="text-blue-100 dark:text-slate-900/60 mt-6 font-medium leading-relaxed">
                            Buat kata sandi baru yang kuat untuk melindungi data bisnis dan transaksi Anda di SmartPOS AI.
                        </p>
                    </div>
                    
                    <div class="relative z-10 pt-8 border-t border-white/20 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center text-blue-900 shadow-lg">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <span class="text-xs text-white font-bold uppercase tracking-widest">Security Layer v2.4</span>
                    </div>

                    {{-- Background Decoration --}}
                    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-white/10 rounded-full blur-[100px]"></div>
                </div>

                {{-- SISI KANAN: Form Reset Password --}}
                <div class="flex-1 flex flex-col h-full bg-white dark:bg-slate-900 overflow-hidden">
                    
                    {{-- Header Form --}}
                    <div class="px-8 pt-8 sm:pt-10 text-right">
                        <span class="text-[10px] font-black text-slate-300 dark:text-slate-700 uppercase tracking-[0.3em]">Update Credentials</span>
                    </div>

                    {{-- Area Form yang bisa di-scroll --}}
                    <div class="flex-1 px-8 sm:px-14 py-6 overflow-y-auto custom-scrollbar flex flex-col justify-center">
                        <div class="mb-10 text-center lg:text-left">
                            <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Atur Ulang Sandi</h1>
                            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">Silakan buat kata sandi baru untuk akun Anda.</p>
                        </div>

                        <form method="POST" action="{{ route('password.store') }}" id="resetPasswordForm" class="space-y-6">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest ml-1">Email Konfirmasi</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300">
                                        <i class="fas fa-envelope text-sm"></i>
                                    </div>
                                    <input type="email" name="email" value="{{ old('email', $request->email) }}" required readonly
                                        class="w-full pl-11 pr-4 py-4 bg-slate-100 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-2xl outline-none text-slate-500 dark:text-slate-400 text-sm cursor-not-allowed">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest ml-1">Kata Sandi Baru</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 dark:group-focus-within:text-green-400 transition">
                                        <i class="fas fa-lock text-sm"></i>
                                    </div>
                                    <input type="password" name="password" id="password" required autofocus
                                        class="w-full pl-11 pr-4 py-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" 
                                        placeholder="••••••••">
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest ml-1">Konfirmasi Kata Sandi</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 dark:group-focus-within:text-green-400 transition">
                                        <i class="fas fa-check-circle text-sm"></i>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                        class="w-full pl-11 pr-4 py-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" 
                                        placeholder="••••••••">
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                            </div>

                            <button type="submit" id="btnSubmit" 
                                    class="w-full bg-blue-600 dark:bg-green-600 hover:bg-blue-700 dark:hover:bg-green-500 text-white dark:text-slate-900 py-4 rounded-2xl font-black text-base transition-all flex items-center justify-center gap-3 shadow-xl shadow-blue-200 dark:shadow-none active:scale-95">
                                <span class="hidden w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin" id="loader"></span>
                                <span id="btnText">Simpan Perubahan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>