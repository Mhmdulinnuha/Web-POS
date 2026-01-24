<nav class="fixed top-0 w-full bg-white/90 dark:bg-black/90 backdrop-blur-md shadow-sm z-50 border-b border-transparent dark:border-green-500/30 transition-colors duration-300">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2 group">
            <div class="w-10 h-10 bg-blue-700 dark:bg-green-600 rounded-lg flex items-center justify-center transition-transform group-hover:rotate-12">
                <i class="fas fa-store text-yellow-400 dark:text-black text-xl"></i>
            </div>
            <span class="text-2xl font-bold tracking-tight text-blue-900 dark:text-yellow-400">
                Smart<span class="text-yellow-500 dark:text-green-500">POS</span>
            </span>
        </div>

        <div class="hidden md:flex items-center space-x-8">
            <a href="#hero" class="font-medium text-slate-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-green-400 transition">Beranda</a>
            <a href="#kelengkapan" class="font-medium text-slate-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-green-400 transition">Kelengkapan</a>
            <a href="#fitur" class="font-medium text-slate-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-green-400 transition">Fitur Utama</a>
            <a href="#keuntungan" class="font-medium text-slate-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-green-400 transition">Keuntungan</a>
            
            <div class="flex items-center gap-4 border-l pl-8 dark:border-gray-700">
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-yellow-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 transition">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                </button>

                <a href="/login" class="bg-blue-700 dark:bg-green-600 text-white dark:text-black px-6 py-2 rounded-full font-bold hover:bg-blue-800 dark:hover:bg-green-500 transition shadow-lg flex items-center gap-2 group">
                    <i class="fas fa-sign-in-alt group-hover:translate-x-1 transition"></i> 
                    Login
                </a>
            </div>
        </div>

        <div class="flex items-center gap-2 md:hidden">
            <button id="theme-toggle-mobile" type="button" class="text-gray-500 dark:text-yellow-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 transition">
                <i class="fas fa-sun hidden dark:block text-lg"></i>
                <i class="fas fa-moon block dark:hidden text-lg"></i>
            </button>

            <button data-collapse-toggle="mobile-menu" type="button" class="text-2xl text-blue-900 dark:text-green-500 focus:outline-none p-2">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-black border-t dark:border-green-500/20 p-6 flex flex-col space-y-4">
        <a href="#hero" class="font-medium dark:text-gray-300">Beranda</a>
        <a href="#kelengkapan" class="font-medium dark:text-gray-300">Kelengkapan</a>
        <a href="#fitur" class="font-medium dark:text-gray-300">Fitur Utama</a>
        <a href="#keuntungan" class="font-medium dark:text-gray-300">Keuntungan</a>
        <hr class="dark:border-gray-700">
        <a href="/login" class="bg-blue-700 dark:bg-green-600 text-white dark:text-black w-full py-3 rounded-xl font-bold text-center">Login</a>
    </div>
</nav>

@push('scripts')
<script>
    // Fungsi umum untuk toggle tema
    function toggleDarkMode() {
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
        
        // Update ikon (untuk desktop SVG)
        updateThemeIcons();
    }

    function updateThemeIcons() {
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon?.classList.remove('hidden');
            themeToggleDarkIcon?.classList.add('hidden');
        } else {
            themeToggleDarkIcon?.classList.remove('hidden');
            themeToggleLightIcon?.classList.add('hidden');
        }
    }

    // Inisialisasi ikon saat load
    updateThemeIcons();

    // Listener untuk Desktop
    document.getElementById('theme-toggle').addEventListener('click', toggleDarkMode);
    
    // Listener untuk Mobile
    document.getElementById('theme-toggle-mobile').addEventListener('click', toggleDarkMode);
</script>
@endpush