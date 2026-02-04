{{-- VIEW MOBILE: GRID CARD --}}
<div class="grid grid-cols-1 gap-4 p-4 md:hidden">
    @forelse($cashiers ?? [] as $cashier)
        <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl border border-slate-100 dark:border-gray-700 shadow-sm relative overflow-hidden group">
            <div class="flex items-center gap-4">
                {{-- Avatar --}}
                <div class="w-12 h-12 bg-blue-100 dark:bg-green-500/20 rounded-full flex items-center justify-center text-blue-600 dark:text-green-400 font-bold">
                    {{ strtoupper(substr($cashier->name, 0, 2)) }}
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-slate-900 dark:text-white text-sm">{{ $cashier->name }}</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $cashier->email }}</p>
                </div>
                <span class="px-2 py-1 text-[10px] font-bold rounded-lg {{ $cashier->status == 'aktif' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                    {{ ucfirst($cashier->status ?? 'Aktif') }}
                </span>
            </div>
            
            <div class="mt-4 pt-4 border-t dark:border-gray-700 flex justify-between items-center">
                <div class="text-[10px] text-slate-400 uppercase font-bold tracking-widest">
                    ID: <span class="text-slate-900 dark:text-slate-200">{{ $cashier->employee_id ?? 'KSR-001' }}</span>
                </div>
                <div class="flex gap-2">
                    <button class="p-2 text-blue-600 bg-blue-50 dark:bg-blue-900/20 rounded-lg"><i class="fas fa-edit"></i></button>
                    <button class="p-2 text-red-600 bg-red-50 dark:bg-red-900/20 rounded-lg"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-10 bg-slate-50 dark:bg-gray-800/50 rounded-2xl border-2 border-dashed dark:border-gray-700">
            <p class="text-slate-400 text-sm italic">Belum ada data kasir.</p>
        </div>
    @endforelse
</div>

{{-- VIEW DESKTOP: TABLE --}}
<div class="hidden md:block">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-50 dark:bg-gray-800/50 text-slate-600 dark:text-slate-300">
            <tr class="border-b dark:border-gray-800">
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Profil Kasir</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">ID Pegawai</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Status Kerja</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Absensi Terakhir</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 dark:divide-gray-800">
            @forelse($cashiers ?? [] as $cashier)
                <tr class="hover:bg-slate-50 dark:hover:bg-gray-800/30 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-green-500/20 rounded-full flex items-center justify-center text-blue-600 dark:text-green-400 font-bold">
                                {{ strtoupper(substr($cashier->name, 0, 2)) }}
                            </div>
                            <div>
                                <div class="font-bold text-slate-900 dark:text-white text-sm">{{ $cashier->name }}</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">{{ $cashier->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono text-sm dark:text-slate-300">{{ $cashier->employee_id ?? 'KSR-001' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-md bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400">
                            {{ $cashier->status ?? 'Aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm dark:text-slate-400">
                        <div class="text-[10px] uppercase font-bold">Terakhir Scan:</div>
                        <div class="font-bold text-slate-900 dark:text-white">08:02 WIB</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex rounded-lg border border-slate-200 dark:border-gray-700 overflow-hidden">
                            <button class="px-3 py-2 bg-white dark:bg-gray-800 hover:text-blue-600 dark:text-slate-400 border-r dark:border-gray-700 transition-colors">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="px-3 py-2 bg-white dark:bg-gray-800 hover:text-red-600 dark:text-slate-400 transition-colors">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                {{-- Data Dummy untuk Contoh jika $cashiers kosong --}}
                <tr class="hover:bg-slate-50 dark:hover:bg-gray-800/30 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-green-500/20 rounded-full flex items-center justify-center text-blue-600 dark:text-green-400 font-bold text-xs">BS</div>
                            <div>
                                <div class="font-bold text-slate-900 dark:text-white text-sm">Budi Santoso</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">budi.kasir@pos.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono text-sm dark:text-slate-300">KSR-001</td>
                    <td class="px-6 py-4"><span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-md bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400">Aktif</span></td>
                    <td class="px-6 py-4 text-sm dark:text-slate-400">
                        <div class="text-[10px] uppercase font-bold text-slate-400">Barcode Scan:</div>
                        <div class="font-bold text-slate-900 dark:text-white">08:02 WIB</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex rounded-lg border border-slate-200 dark:border-gray-700 overflow-hidden shadow-sm">
                            <button class="px-3 py-2 bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 text-blue-600 border-r dark:border-gray-700 transition-colors"><i class="fas fa-edit"></i></button>
                            <button class="px-3 py-2 bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 text-dark border-r dark:border-gray-700 transition-colors"><i class="fas fa-qrcode"></i></button>
                            <button class="px-3 py-2 bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 text-red-600 transition-colors"><i class="fas fa-user-times"></i></button>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>