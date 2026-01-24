<aside id="sidebar-admin" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-blue-700 dark:bg-black dark:border-r dark:border-green-500/30">
    <div class="h-full px-4 py-8 overflow-y-auto flex flex-col">
        <div class="flex flex-col items-center mb-10 text-center">
            <div class="w-14 h-14 bg-transparent rounded-xl flex items-center justify-center mb-3">
                <i class="fas fa-store text-yellow-400 dark:text-yellow-400 text-4xl"></i>
            </div>
            <h1 class="text-white dark:text-white font-black text-xl tracking-wider uppercase">POS SYSTEM</h1>
            <div class="w-full h-px bg-white/20 dark:bg-green-500/20 mt-6"></div>
        </div>

        <ul class="space-y-2 font-medium flex-1">
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center p-3 text-yellow-400 dark:text-yellow-400 bg-white/10 dark:bg-green-500/10 rounded-xl group transition-all">
                    <i class="fas fa-tachometer-alt w-6 text-lg transition duration-75"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-white dark:text-white hover:bg-white/5 dark:hover:bg-green-500/5 rounded-xl group transition-all">
                    <i class="fas fa-box w-6 text-lg text-white/70 dark:text-white/70 group-hover:text-white dark:group-hover:text-white"></i>
                    <span class="ms-3">Produk</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-white dark:text-white hover:bg-white/5 dark:hover:bg-green-500/5 rounded-xl group transition-all">
                    <i class="fas fa-users w-6 text-lg text-white/70 dark:text-white/70 group-hover:text-white dark:group-hover:text-white"></i>
                    <span class="ms-3">Kasir</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-white dark:text-white hover:bg-white/5 dark:hover:bg-green-500/5 rounded-xl group transition-all">
                    <i class="fas fa-file-alt w-6 text-lg text-white/70 dark:text-white/70 group-hover:text-white dark:group-hover:text-white"></i>
                    <span class="ms-3">Laporan</span>
                </a>
            </li>
        </ul>

        <div class="pt-4 border-t border-white/10 dark:border-green-500/20 space-y-3">
            <button id="theme-toggle-admin" type="button" class="w-full flex items-center justify-center gap-2 p-3 text-white dark:text-yellow-400 hover:bg-white/10 dark:hover:bg-green-500/10 rounded-xl transition-all">
                <svg id="theme-toggle-dark-icon-admin" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon-admin" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                <span class="text-xs font-bold uppercase tracking-widest">Mode</span>
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center p-3 text-red-400 dark:text-red-400 hover:bg-red-500/10 dark:hover:bg-red-500/10 rounded-xl transition-all group">
                    <i class="fas fa-sign-out-alt w-6 text-lg"></i>
                    <span class="ms-3 font-bold uppercase text-sm tracking-widest">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

@push('scripts')
<script>
    // Admin Dark Mode Toggle
    var themeToggleDarkIconAdmin = document.getElementById('theme-toggle-dark-icon-admin');
    var themeToggleLightIconAdmin = document.getElementById('theme-toggle-light-icon-admin');

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIconAdmin.classList.remove('hidden');
    } else {
        themeToggleDarkIconAdmin.classList.remove('hidden');
    }

    var themeToggleBtnAdmin = document.getElementById('theme-toggle-admin');
    themeToggleBtnAdmin.addEventListener('click', function() {
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
</script>
@endpush