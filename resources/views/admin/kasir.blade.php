<x-app-layout>
    <x-slot name="header">
        Manajemen Kasir & Staff
    </x-slot>

    <div class="space-y-6 pb-20">
        {{-- Notifikasi --}}
        @if(session('success'))
            <div
                class="p-4 bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 rounded-xl flex items-center gap-3">
                <i class="fas fa-check-circle"></i>
                <span class="text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Header & Button Tambah --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <p class="text-sm text-slate-500 dark:text-slate-400">Kelola hak akses dan pantau absensi kasir secara
                    real-time.</p>
            </div>
            <button onclick="document.getElementById('modalTambahKasir').classList.remove('hidden')"
                class="inline-flex items-center justify-center px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold rounded-xl transition-all shadow-lg shadow-yellow-400/20">
                <i class="fas fa-user-plus mr-2"></i>
                Tambah Kasir Baru
            </button>
        </div>

        {{-- Statistik Kasir (Card) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div
                class="bg-white dark:bg-gray-900 p-4 rounded-2xl border-l-4 border-green-500 shadow-sm transition-colors">
                <div class="flex items-center gap-4">
                    <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-xl text-green-600">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                    <div>
                        <h5 class="text-xl font-black text-slate-900 dark:text-white line-clamp-1">8 Kasir</h5>
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-widest font-bold">Hadir
                            Hari Ini</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-gray-900 p-4 rounded-2xl border-l-4 border-red-500 shadow-sm transition-colors">
                <div class="flex items-center gap-4">
                    <div class="bg-red-50 dark:bg-red-900/20 p-3 rounded-xl text-red-600">
                        <i class="fas fa-times-circle text-2xl"></i>
                    </div>
                    <div>
                        <h5 class="text-xl font-black text-slate-900 dark:text-white line-clamp-1">2 Kasir</h5>
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-widest font-bold">Izin /
                            Alpha</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table Section (Desktop) / Grid Section (Mobile) --}}
        <div
            class="bg-white dark:bg-gray-900 rounded-2xl border border-slate-200 dark:border-gray-800 shadow-sm overflow-hidden transition-colors">
            <div class="overflow-x-auto">
                {{-- Kita bisa buatkan @include untuk isi tabel/list kasir agar rapi --}}
                @include('admin.components.kasir-table')
            </div>
        </div>
    </div>

    {{-- MODAL REGISTRASI KASIR --}}
    <div id="modalTambahKasir" class="fixed inset-0 z-[60] hidden overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-slate-950/50 backdrop-blur-sm transition-opacity"
                onclick="this.parentElement.parentElement.classList.add('hidden')"></div>
            <div
                class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full border border-white dark:border-gray-800">
                <div
                    class="bg-blue-700 dark:bg-black px-6 py-4 flex justify-between items-center border-b dark:border-green-500/20 text-white">
                    <h3 class="text-lg font-bold dark:text-yellow-400 uppercase tracking-widest">Registrasi Kasir</h3>
                    <button onclick="document.getElementById('modalTambahKasir').classList.add('hidden')"
                        class="opacity-70 hover:opacity-100"><i class="fas fa-times text-xl"></i></button>
                </div>
                <div class="p-8">
                    {{-- File Komponen Form --}}
                    @include('admin.components.form-kasir')
                </div>
                <div
                    class="bg-slate-50 dark:bg-gray-800/50 px-8 py-4 flex justify-end gap-3 border-t dark:border-gray-800">
                    <button type="button" onclick="document.getElementById('modalTambahKasir').classList.add('hidden')"
                        class="px-6 py-2 text-slate-600 dark:text-slate-400 font-bold hover:text-slate-900 transition-colors">
                        Batal
                    </button>

                    {{-- Tambahkan type="submit" dan form="formTambahKasir" --}}
                    <button type="submit" form="formTambahKasir"
                        class="px-8 py-2 bg-blue-700 dark:bg-green-600 text-white dark:text-black rounded-xl font-bold shadow-lg active:scale-95 transition-all">
                        Daftarkan Kasir
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>