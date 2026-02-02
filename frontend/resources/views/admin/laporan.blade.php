<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            LAPORAN PENJUALAN
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-bold dark:text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            AI Sales Forecasting
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-slate-400">Prediksi tren berdasarkan data historis (Django Engine)</p>
                    </div>
                    <div class="flex bg-slate-100 dark:bg-slate-800 p-1 rounded-lg gap-1">
                        <button onclick="changeAIFilter('hour')" class="px-3 py-1 text-xs font-medium rounded-md hover:bg-white dark:hover:bg-slate-700 transition">Jam</button>
                        <button onclick="changeAIFilter('week')" class="px-3 py-1 text-xs font-medium rounded-md hover:bg-white dark:hover:bg-slate-700 transition">Minggu</button>
                        <button onclick="changeAIFilter('month')" class="px-3 py-1 text-xs font-medium rounded-md hover:bg-white dark:hover:bg-slate-700 transition">Bulan</button>
                    </div>
                </div>

                <div class="relative h-64 w-full">
                    <div id="ai-loading" class="absolute inset-0 flex items-center justify-center bg-gray-50 dark:bg-slate-800 rounded-xl animate-pulse z-10">
                        <div class="flex flex-col items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-purple-500" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="text-sm text-gray-500 font-medium">Menghubungkan ke Django...</span>
                        </div>
                    </div>
                    <canvas id="aiChart"></canvas>
                </div>

                <div class="mt-4 p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl border border-purple-100 dark:border-purple-800/50">
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 h-10 w-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">AI</div>
                        <div>
                            <p class="text-xs font-semibold text-purple-700 dark:text-purple-400 uppercase tracking-wider">AI Insight & Analysis</p>
                            <p id="chatbot-bubble" class="text-sm text-gray-700 dark:text-slate-300 mt-1 leading-relaxed italic">Menganalisis data transaksi Anda...</p>
                            <div class="mt-2 text-xs text-gray-500">
                                Produk terlaris: <span id="top-item-name" class="font-bold text-slate-700 dark:text-white">-</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                <form action="{{ route('laporan') }}" method="GET" class="flex flex-wrap items-end gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Dari Tanggal</label>
                        <input type="date" name="start_date" value="{{ $startDate->format('Y-m-d') }}" class="rounded-lg border-gray-300 dark:bg-slate-800 dark:border-slate-700 dark:text-white focus:ring-blue-500 w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Sampai Tanggal</label>
                        <input type="date" name="end_date" value="{{ $endDate->format('Y-m-d') }}" class="rounded-lg border-gray-300 dark:bg-slate-800 dark:border-slate-700 dark:text-white focus:ring-blue-500 w-full">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition shadow-sm">Filter Laporan</button>
                        <a href="{{ route('laporan') }}" class="px-5 py-2.5 bg-gray-200 dark:bg-slate-700 text-gray-800 dark:text-white rounded-lg font-medium transition shadow-sm">Reset</a>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                    <p class="text-sm text-gray-500 dark:text-slate-400 font-medium">Total Jenis Produk</p>
                    <h3 class="text-2xl font-bold dark:text-white mt-1">{{ number_format($totalProduk) }}</h3>
                </div>
                <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800 border-l-4 border-l-blue-500">
                    <p class="text-sm text-gray-500 dark:text-slate-400 font-medium">
                        {{ $startDate->isToday() && $endDate->isToday() ? 'Terjual (Hari Ini)' : 'Terjual (Periode Ini)' }}
                    </p>
                    <h3 class="text-2xl font-bold dark:text-white mt-1">{{ number_format($terjualDalamPeriode) }}</h3>
                </div>
                <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                    <p class="text-sm text-gray-500 dark:text-slate-400 font-medium">
                        {{ $startDate->isToday() && $endDate->isToday() ? 'Uang Masuk (Hari Ini)' : 'Uang Masuk (Periode Ini)' }}
                    </p>
                    <h3 class="text-2xl font-bold text-green-600 mt-1">Rp {{ number_format($uangMasukPeriode, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                    <p class="text-sm text-gray-500 dark:text-slate-400 font-medium">Total Omzet (All Time)</p>
                    <h3 class="text-2xl font-bold dark:text-white mt-1">Rp {{ number_format($totalUangMasuk, 0, ',', '.') }}</h3>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border dark:border-slate-800 overflow-hidden">
                <div class="p-6 border-b dark:border-slate-800 flex justify-between items-center bg-gray-50/50 dark:bg-slate-800/50">
                    <h3 class="text-lg font-bold dark:text-white">Daftar Transaksi Periode Ini</h3>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400 rounded-full text-xs font-bold">{{ $allTransactions->count() }} Transaksi</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 dark:bg-slate-800 text-xs uppercase text-gray-500 tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Tanggal & Waktu</th>
                                <th class="px-6 py-4">Kasir</th>
                                <th class="px-6 py-4">Produk</th>
                                <th class="px-6 py-4 text-center">Metode</th>
                                <th class="px-6 py-4 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-slate-800 text-sm dark:text-slate-300">
                            @forelse($allTransactions as $tx)
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/50 transition">
                                    <td class="px-6 py-4">{{ $tx->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $tx->user->name }}</td>
                                    <td class="px-6 py-4">{{ $tx->product->nama_produk }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-2 py-1 bg-gray-100 dark:bg-slate-700 rounded text-xs font-bold uppercase">
                                            {{ $tx->payment_method }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($tx->total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                        Tidak ada transaksi ditemukan pada rentang tanggal ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('aiChart').getContext('2d');
        const loadingEl = document.getElementById('ai-loading');
        let myChart;

        window.changeAIFilter = async (filterType) => {
            loadingEl.style.display = 'flex';
            const adminId = "{{ auth()->id() }}";

            try {
                // Endpoint Django dengan penambahan HEADERS untuk Bypass Ngrok Warning
                const response = await fetch(`http://127.0.0.1:8001/api/analytics/?admin_id=${adminId}&type=${filterType}`, {
                    method: 'GET',
                    headers: {
                        'ngrok-skip-browser-warning': '69420', // Wajib untuk bypass halaman "Visit Site"
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                if (!response.ok) throw new Error('Network response was not ok');
                
                const data = await response.json();

                // Logika Update Grafik
                if (myChart) myChart.destroy();
                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Revenue',
                            data: data.values,
                            borderColor: '#8b5cf6',
                            backgroundColor: 'rgba(139, 92, 246, 0.1)',
                            tension: 0.4,
                            fill: true,
                            borderWidth: 3,
                            pointRadius: 4,
                            pointBackgroundColor: '#8b5cf6'
                        }]
                    },
                    options: { 
                        responsive: true, 
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { 
                                beginAtZero: true,
                                grid: { color: 'rgba(255,255,255,0.05)' },
                                ticks: { color: '#94a3b8' }
                            },
                            x: { 
                                grid: { display: false },
                                ticks: { color: '#94a3b8' }
                            }
                        }
                    }
                });

                // Update teks chatbot dan info produk terlaris
                document.getElementById('chatbot-bubble').innerText = data.chatbot_says;
                document.getElementById('top-item-name').innerText = data.top_item;
                
                loadingEl.style.display = 'none';

            } catch (error) {
                console.error("AI Engine Error:", error);
                loadingEl.innerHTML = `
                    <div class="text-center p-4">
                        <p class="text-red-500 text-xs font-bold uppercase tracking-widest">⚠️ Connection Failed</p>
                        <p class="text-gray-400 text-[10px] mt-1 italic">Cek Django (Port 8001) & Konfigurasi CORS di settings.py</p>
                    </div>
                `;
            }
        };

        // Jalankan filter default saat halaman dimuat
        changeAIFilter('hour');
    });
</script>
</x-app-layout>