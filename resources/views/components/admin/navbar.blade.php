<button data-drawer-target="sidebar-admin" data-drawer-toggle="sidebar-admin" aria-controls="sidebar-admin"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-blue-600 rounded-lg sm:hidden hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-200 dark:text-green-500 dark:hover:bg-gray-700 dark:focus:ring-green-600 fixed top-2 left-2 z-50 bg-white dark:bg-black shadow-md border dark:border-green-500/30">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="sidebar-admin"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white border-r border-blue-100 dark:bg-black dark:border-green-500/30 shadow-xl"
    aria-label="Sidebar">
    <div class="h-full px-4 py-8 overflow-y-auto flex flex-col justify-between">
        <div>
            <div class="flex flex-col items-center mb-10 text-center">
                <div
                    class="w-16 h-16 bg-blue-600 dark:bg-green-600 rounded-2xl flex items-center justify-center mb-3 shadow-lg shadow-blue-200 dark:shadow-green-900/40">
                    <i class="fas fa-store text-yellow-400 text-3xl"></i>
                </div>
                <h1 class="text-blue-900 dark:text-yellow-400 font-black text-xl tracking-wider uppercase">POS SYSTEM
                </h1>
                <div
                    class="w-full h-px bg-gradient-to-r from-transparent via-blue-200 dark:via-green-500/30 to-transparent mt-6">
                </div>
            </div>

            <ul class="space-y-2 font-semibold">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-3 {{ request()->routeIs('dashboard') ? 'text-blue-700 bg-blue-50 border-l-4 border-yellow-400 rounded-r-xl dark:text-yellow-400 dark:bg-green-500/10 dark:border-green-500' : 'text-slate-600 hover:bg-blue-50 dark:text-slate-300 dark:hover:bg-green-500/5' }} transition-all">
                        <i class="fas fa-tachometer-alt w-6 text-lg"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/produk"
                        class="flex items-center p-3 text-slate-600 hover:text-blue-700 hover:bg-blue-50 dark:text-slate-300 dark:hover:text-green-400 dark:hover:bg-green-500/5 rounded-xl group transition-all">
                        <i class="fas fa-box w-6 text-lg opacity-70 group-hover:opacity-100 transition-opacity"></i>
                        <span class="ms-3">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="/kasir"
                        class="flex items-center p-3 text-slate-600 hover:text-blue-700 hover:bg-blue-50 dark:text-slate-300 dark:hover:text-green-400 dark:hover:bg-green-500/5 rounded-xl group transition-all">
                        <i class="fas fa-users w-6 text-lg opacity-70 group-hover:opacity-100 transition-opacity"></i>
                        <span class="ms-3">Kasir</span>
                    </a>
                </li>
                <li>
                    <a href="/laporan"
                        class="flex items-center p-3 text-slate-600 hover:text-blue-700 hover:bg-blue-50 dark:text-slate-300 dark:hover:text-green-400 dark:hover:bg-green-500/5 rounded-xl group transition-all">
                        <i
                            class="fas fa-file-alt w-6 text-lg opacity-70 group-hover:opacity-100 transition-opacity"></i>
                        <span class="ms-3">Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="/setting"
                        class="flex items-center p-3 {{ request()->routeIs('setting') ? 'text-blue-700 bg-blue-50 border-l-4 border-yellow-400 rounded-r-xl dark:text-yellow-400 dark:bg-green-500/10 dark:border-green-500' : 'text-slate-600 hover:bg-blue-50 dark:text-slate-300 dark:hover:bg-green-500/5' }} transition-all">
                        <!-- Ikon Setting (Gerigi) -->
                        <i class="fas fa-cog w-6 text-lg"></i>
                        <span class="ms-3">Setting</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="pt-4 border-t border-blue-50 dark:border-green-500/20 space-y-3">
            <button id="theme-toggle-admin" type="button"
                class="w-full flex items-center justify-center gap-2 p-3 text-blue-700 bg-blue-50 dark:text-yellow-400 dark:bg-green-500/10 hover:shadow-inner rounded-xl transition-all font-bold">
                <svg id="theme-toggle-dark-icon-admin" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon-admin" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z">
                    </path>
                </svg>
                <span class="text-xs uppercase tracking-widest">Tema</span>
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center p-3 text-red-600 hover:bg-red-50 dark:text-red-500 dark:hover:bg-red-500/10 rounded-xl transition-all group font-bold">
                    <i class="fas fa-power-off w-6 text-lg"></i>
                    <span class="ms-3 uppercase text-xs tracking-widest">Keluar</span>
                </button>
            </form>
        </div>
    </div>
</aside>

@push('scripts')
    <script>
        const themeToggleDarkIconAdmin = document.getElementById('theme-toggle-dark-icon-admin');
        const themeToggleLightIconAdmin = document.getElementById('theme-toggle-light-icon-admin');

        // Sinkronisasi Ikon dengan Tema saat ini
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIconAdmin?.classList.remove('hidden');
        } else {
            themeToggleDarkIconAdmin?.classList.remove('hidden');
        }

        const themeToggleBtnAdmin = document.getElementById('theme-toggle-admin');
        if (themeToggleBtnAdmin) {
            themeToggleBtnAdmin.addEventListener('click', function () {
                themeToggleDarkIconAdmin.classList.toggle('hidden');
                themeToggleLightIconAdmin.classList.toggle('hidden');

                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            });
        }
    </script>
@endpush