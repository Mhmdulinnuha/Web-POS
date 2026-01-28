<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    {{-- Header Kasir --}}
    <header class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="font-bold text-lg">🧾 POS Kasir</h1>
        <span class="text-sm">
            {{ auth()->user()->name ?? 'Kasir' }}
        </span>
    </header>

    {{-- Konten --}}
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
