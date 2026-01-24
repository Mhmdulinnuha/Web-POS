<x-guest-layout>
    {{-- Wrapper utama: 100vh Fullscreen --}}
    <div class="h-screen w-full flex items-center justify-center bg-slate-50 dark:bg-slate-950 overflow-hidden transition-colors duration-500">
        
        {{-- Kontainer: Landscape di PC, Full di HP --}}
        <div class="w-full h-full lg:h-[75vh] lg:max-w-4xl lg:px-6 z-10 flex flex-col justify-center">

            {{-- Card Utama --}}
            <div class="flex-1 lg:flex-none lg:h-full bg-white dark:bg-slate-900 
                        sm:rounded-[2.5rem] shadow-2xl border-white dark:border-slate-800 
                        overflow-hidden flex flex-col lg:flex-row transition-all border relative">

                {{-- SISI KIRI: Visual Branding (Hanya PC) --}}
                <div class="hidden lg:flex lg:w-5/12 bg-blue-600 dark:bg-green-600 p-12 flex-col justify-center relative overflow-hidden">
                    <div class="relative z-10 text-center">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-3xl flex items-center justify-center mb-8 mx-auto -rotate-12">
                            <i class="fas fa-envelope-open-text text-white text-4xl"></i>
                        </div>
                        <h2 class="text-3xl font-black text-white leading-tight">Cek Email <br> Anda.</h2>
                        <p class="text-blue-100 dark:text-slate-900/70 mt-4 text-sm font-medium leading-relaxed">
                            Kami telah mengirimkan tautan verifikasi untuk memastikan keamanan akun SmartPOS Anda.
                        </p>
                    </div>
                    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-white/10 rounded-full blur-[100px]"></div>
                </div>

                {{-- SISI KANAN: Konten Verifikasi --}}
                <div class="flex-1 flex flex-col h-full bg-white dark:bg-slate-900 justify-center">
                    <div class="px-8 sm:px-14 py-10">
                        <div class="mb-8 text-center lg:text-left">
                            <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Verifikasi Email</h1>
                            <p class="text-slate-500 dark:text-slate-400 mt-3 text-sm leading-relaxed">
                                {{ __('Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan.') }}
                            </p>
                        </div>

                        {{-- Status Session: Link Terkirim --}}
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-8 p-4 bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 rounded-2xl flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <p class="text-xs font-bold text-green-600 dark:text-green-400">
                                    {{ __('Tautan verifikasi baru telah dikirimkan ke alamat email Anda.') }}
                                </p>
                            </div>
                        @endif

                        <div class="flex flex-col gap-4">
                            <form method="POST" action="{{ route('verification.send') }}" id="resendForm">
                                @csrf
                                <button type="submit" id="btnResend" 
                                        class="w-full bg-blue-600 dark:bg-green-600 hover:bg-blue-700 dark:hover:bg-green-500 text-white dark:text-slate-900 py-4 rounded-2xl font-black text-sm transition-all flex items-center justify-center gap-3 shadow-xl shadow-blue-200 dark:shadow-none">
                                    <span class="hidden w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin" id="loader"></span>
                                    <span id="btnText">{{ __('Kirim Ulang Email Verifikasi') }}</span>
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}" class="text-center">
                                @csrf
                                <button type="submit" class="text-xs font-bold text-slate-400 hover:text-red-500 dark:text-slate-500 dark:hover:text-red-400 uppercase tracking-widest transition-colors">
                                    {{ __('Keluar (Log Out)') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

@push('scripts')
<script>
    const form = document.getElementById('resendForm');
    const btn = document.getElementById('btnResend');
    const loader = document.getElementById('loader');
    const btnText = document.getElementById('btnText');

    form.addEventListener('submit', () => {
        btn.disabled = true;
        loader.classList.remove('hidden');
        btnText.textContent = 'Mengirim Ulang...';
    });
</script>
@endpush