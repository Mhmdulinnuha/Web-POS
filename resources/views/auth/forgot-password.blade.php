<x-guest-layout>
    {{-- Wrapper utama: Mengunci tinggi layar 100vh --}}
    <div class="h-screen w-full flex items-center justify-center bg-slate-50 dark:bg-slate-950 overflow-hidden transition-colors duration-500">
        
        {{-- Kontainer --}}
        <div class="w-full h-full lg:h-[70vh] lg:max-w-4xl lg:px-6 z-10 flex flex-col justify-center">

            {{-- Card Utama --}}
            <div class="flex-1 lg:flex-none lg:h-full bg-white dark:bg-slate-900 
                        sm:rounded-[2.5rem] shadow-2xl border-white dark:border-slate-800 
                        overflow-hidden flex flex-col lg:flex-row transition-all border relative">
                
                {{-- Tombol Kembali --}}
                <div class="absolute top-6 left-6 z-50">
                    <a href="{{ route('login') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 hover:bg-blue-600 hover:text-white dark:hover:bg-green-600 dark:hover:text-slate-900 transition-all shadow-sm">
                        <i class="fas fa-arrow-left text-sm"></i>
                    </a>
                </div>

                {{-- SISI KIRI: Visual Branding (Hanya PC) --}}
                <div class="hidden lg:flex lg:w-5/12 bg-blue-600 dark:bg-green-600 p-12 flex-col justify-center relative overflow-hidden">
                    <div class="relative z-10 text-center">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-3xl flex items-center justify-center mb-8 mx-auto rotate-12">
                            <i class="fas fa-key text-white text-4xl"></i>
                        </div>
                        <h2 class="text-3xl font-black text-white leading-tight">Keamanan <br> Prioritas Kami.</h2>
                        <p class="text-blue-100 dark:text-slate-900/70 mt-4 text-sm font-medium leading-relaxed">
                            Jangan khawatir, kami akan membantu Anda memulihkan akses ke sistem SmartPOS AI.
                        </p>
                    </div>
                    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-white/10 rounded-full blur-[100px]"></div>
                </div>

                {{-- SISI KANAN: Form Utama --}}
                <div class="flex-1 flex flex-col h-full bg-white dark:bg-slate-900 justify-center">
                    <div class="px-8 sm:px-14 py-10">
                        <div class="mb-8 text-center lg:text-left">
                            <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Lupa Kata Sandi?</h1>
                            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm leading-relaxed">
                                {{ __('Masukkan alamat email Anda dan kami akan mengirimkan tautan pemulihan kata sandi.') }}
                            </p>
                        </div>

                        <x-auth-session-status class="mb-6" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}" id="forgotPasswordForm" class="space-y-6">
                            @csrf

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest ml-1">Email Terdaftar</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 dark:group-focus-within:text-green-400 transition">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input type="email" name="email" :value="old('email')" required autofocus
                                        class="w-full pl-11 pr-4 py-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" 
                                        placeholder="nama@smartpos.com">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <button type="submit" id="btnSubmit" 
                                    class="w-full bg-blue-600 dark:bg-green-600 hover:bg-blue-700 dark:hover:bg-green-500 text-white dark:text-slate-900 py-4 rounded-2xl font-black text-sm transition-all flex items-center justify-center gap-3 shadow-xl shadow-blue-200 dark:shadow-none active:scale-95">
                                <span class="hidden w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin" id="loader"></span>
                                <span id="btnText">Kirim Tautan Pemulihan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

@push('scripts')
<script>
    const form = document.getElementById('forgotPasswordForm');
    const btn = document.getElementById('btnSubmit');
    const loader = document.getElementById('loader');
    const btnText = document.getElementById('btnText');

    form.addEventListener('submit', () => {
        btn.disabled = true;
        loader.classList.remove('hidden');
        btnText.textContent = 'Mengirim Email...';
    });
</script>
@endpush