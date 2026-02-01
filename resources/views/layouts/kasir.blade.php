<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<x-kasir.sidebar />

    <div class="sm:ml-64 min-h-screen">
        <header class="bg-white dark:bg-slate-800 border-b border-gray-100 dark:border-slate-700 py-4 px-6 sticky top-0 z-30">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-gray-800 dark:text-white">Panel Transaksi</h2>
                <div class="text-sm text-gray-500 font-medium">
                    {{ now()->format('l, d F Y') }}
                </div>
            </div>
        </header>

        <main class="p-6">
            @yield('content')
        </main>
    </div>
    <button class="fixed bottom-8 right-8 w-20 h-20 bg-yellow-400 hover:bg-[#0d47a1] hover:text-yellow-400 text-[#0d47a1] rounded-full shadow-[0_8px_30px_rgb(0,0,0,0.2)] flex items-center justify-center border-4 border-white z-50 transition-all group scale-100 hover:scale-110 active:scale-95">
        <div class="relative">
            <i class="fas fa-shopping-cart text-3xl"></i>
            <span class="absolute -top-4 -right-4 bg-red-600 text-white text-xs font-bold w-7 h-7 flex items-center justify-center rounded-full border-2 border-white">3</span>
        </div>
    </button>

</body>
</html>
