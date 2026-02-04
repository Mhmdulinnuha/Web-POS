<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class'
            }
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <script>
            // Logika Inisialisasi Tema (Dark Mode)
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .floating-cs { animation: pulse 2s infinite; }
            @keyframes pulse {
                0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(250, 204, 21, 0.7); }
                70% { transform: scale(1.05); box-shadow: 0 0 0 15px rgba(250, 204, 21, 0); }
                100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(250, 204, 21, 0); }
            }
        </style>
    </head>
    <body class="antialiased bg-white dark:bg-black text-slate-900 dark:text-white transition-colors duration-300">

        @auth
            <x-admin.navbar />

            <div class="sm:ml-64 min-h-screen flex flex-col">
                <header class="bg-white dark:bg-gray-900 shadow-sm border-b dark:border-gray-800 sticky top-0 z-30">
                    <div class="px-6 py-4 flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                            {{ $header ?? 'SmartPOS Dashboard' }}
                        </h2>
                        
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400 uppercase">{{ Auth::user()->name }}</span>
                            <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-green-600/20 flex items-center justify-center border border-blue-200 dark:border-green-500/30">
                                <i class="fas fa-user text-blue-600 dark:text-green-500"></i>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="p-6 flex-1">
                    {{ $slot ?? '' }}
                    @yield('content')
                </main>

                <x-admin.footer />
            </div>
        @else
            <x-navbar /> 
            
            <main>
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            <x-footer />

            <a href="https://wa.me/6281234567890" target="_blank" 
               class="floating-cs fixed bottom-8 right-8 bg-yellow-400 dark:bg-green-500 text-blue-900 dark:text-black w-16 h-16 rounded-full flex items-center justify-center shadow-2xl z-50 hover:scale-110 transition cursor-pointer">
                <i class="fab fa-whatsapp text-3xl"></i>
            </a>
        @endauth

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        @stack('scripts')
    </body>
</html>