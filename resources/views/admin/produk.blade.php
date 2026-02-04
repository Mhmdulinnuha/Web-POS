<x-app-layout>
    <x-slot name="header">
        Katalog Produk & Inventori
    </x-slot>

    <div class="space-y-6 pb-20">
        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="p-4 bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 rounded-xl flex items-center gap-3 shadow-sm animate-fade-in-down">
                <i class="fas fa-check-circle"></i>
                <span class="text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Header & Button Tambah --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 px-4 md:px-0">
            <div>
                <p class="text-sm text-slate-500 dark:text-slate-400">Kelola barang, harga modal/jual, dan kategori produk.</p>
            </div>
            <button onclick="document.getElementById('modalTambahProduk').classList.remove('hidden')"
                class="inline-flex items-center justify-center px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold rounded-xl transition-all shadow-lg shadow-yellow-400/20">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Produk Baru
            </button>
        </div>

        {{-- Search Section --}}
        <div class="mx-4 md:mx-0 bg-white dark:bg-gray-900 p-5 rounded-2xl border border-slate-200 dark:border-gray-800 shadow-sm transition-colors">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="searchProduk" placeholder="Cari produk..." 
                    class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-xl text-sm dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-green-500 outline-none transition-all">
            </div>
        </div>

        {{-- LAYOUT 1: MOBILE (GRID CARD 2 KOLOM) --}}
        <div class="grid grid-cols-2 gap-4 p-4 md:hidden">
            @forelse($products as $item)
                <div onclick="editProduk({{ $item->id }})" class="bg-white dark:bg-gray-800 rounded-2xl p-3 shadow-sm border border-slate-100 dark:border-gray-700 active:scale-95 transition-all cursor-pointer relative overflow-hidden group">
                    <div class="w-full aspect-square bg-slate-50 dark:bg-gray-900 rounded-xl mb-3 flex items-center justify-center overflow-hidden border dark:border-gray-700">
                        @if($item->foto_produk)
                            <img src="{{ asset('storage/' . $item->foto_produk) }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-box text-2xl text-slate-300 dark:text-gray-600"></i>
                        @endif
                    </div>

                    <div class="space-y-1">
                        <h4 class="font-bold text-slate-900 dark:text-white text-[11px] truncate uppercase tracking-tighter">{{ $item->nama_produk }}</h4>
                        <p class="text-[10px] text-green-600 dark:text-green-400 font-black">Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                        
                        <div class="pt-1">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[8px] dark:text-slate-400 font-bold uppercase">{{ $item->stok_aktif }} Unit</span>
                            </div>
                            <div class="w-full h-1 bg-slate-100 dark:bg-gray-700 rounded-full overflow-hidden">
                                @php
                                    $stokPercentage = $item->stok_aktif > 0 ? min(($item->stok_aktif / ($item->stok_minimal * 2)) * 100, 100) : 0;
                                    $stokColor = $item->stok_aktif <= $item->stok_minimal ? 'bg-red-500' : 'bg-green-500';
                                @endphp
                                <div class="{{ $stokColor }}" style="width: {{ $stokPercentage }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 py-10 text-center text-slate-400 italic text-sm">Belum ada produk</div>
            @endforelse
        </div>

        {{-- LAYOUT 2: DESKTOP (TABLE) --}}
        <div class="hidden md:block bg-white dark:bg-gray-900 rounded-2xl border border-slate-200 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 dark:bg-gray-800/50 text-slate-600 dark:text-slate-300">
                        <tr class="border-b dark:border-gray-800">
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Produk</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Kategori</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-center">Harga</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-center">Stok</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-gray-800">
                        @forelse($products as $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-gray-800/30 transition-colors cursor-pointer" onclick="editProduk({{ $item->id }})">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-green-500/20 rounded-lg flex items-center justify-center overflow-hidden flex-shrink-0">
                                            @if($item->foto_produk)
                                                <img src="{{ asset('storage/' . $item->foto_produk) }}" class="w-full h-full object-cover">
                                            @else
                                                <i class="fas fa-box text-blue-600 dark:text-green-400"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900 dark:text-white text-sm">{{ $item->nama_produk }}</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">SKU: {{ $item->sku }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm dark:text-slate-300 capitalize">{{ str_replace('-', ' ', $item->kategori) }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="text-slate-500 dark:text-slate-400 text-center text-xs">M: Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</div>
                                    <div class="font-bold text-green-600 dark:text-green-400 text-center">J: Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-900 dark:text-white text-sm text-center">{{ $item->stok_aktif }} Unit</div>
                                    <div class="w-24 h-1.5 bg-slate-100 dark:bg-gray-700 rounded-full mt-1.5 overflow-hidden mx-auto">
                                        @php
                                            $stokPercentage = $item->stok_aktif > 0 ? min(($item->stok_aktif / ($item->stok_minimal * 2)) * 100, 100) : 0;
                                            $stokColor = $item->stok_aktif <= $item->stok_minimal ? 'bg-red-500' : 'bg-green-500';
                                        @endphp
                                        <div class="{{ $stokColor }}" style="width: {{ $stokPercentage }}%"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex rounded-lg border border-slate-200 dark:border-gray-700 overflow-hidden" onclick="event.stopPropagation()">
                                        <button type="button" onclick="editProduk({{ $item->id }})" class="px-3 py-2 bg-white dark:bg-gray-800 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400 border-r dark:border-gray-700 transition-colors"><i class="fas fa-edit"></i></button>
                                        
                                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-2 bg-white dark:bg-gray-800 hover:text-red-600 dark:text-slate-400 dark:hover:text-red-400 transition-colors"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-10 text-center text-slate-400 italic">Belum ada produk</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH --}}
    <div id="modalTambahProduk" class="fixed inset-0 z-[60] hidden overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-slate-950/50 backdrop-blur-sm transition-opacity" onclick="this.parentElement.parentElement.classList.add('hidden')"></div>
            <div class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-white dark:border-gray-800">
                <div class="bg-blue-700 dark:bg-black px-6 py-4 flex justify-between items-center border-b dark:border-green-500/20">
                    <h3 class="text-lg font-bold text-white dark:text-yellow-400 uppercase tracking-widest"><i class="fas fa-box-open mr-2"></i> Input Produk Baru</h3>
                    <button onclick="document.getElementById('modalTambahProduk').classList.add('hidden')" class="text-white/70 hover:text-white"><i class="fas fa-times text-xl"></i></button>
                </div>
                <div class="p-8">@include('admin.components.form-produk')</div>
                <div class="bg-slate-50 dark:bg-gray-800/50 px-8 py-4 flex justify-end gap-3 border-t dark:border-gray-800">
                    <button type="button" onclick="document.getElementById('modalTambahProduk').classList.add('hidden')" class="px-6 py-2 text-slate-600 dark:text-slate-400 font-bold">Batal</button>
                    <button type="submit" form="formProduk" class="px-8 py-2 bg-blue-700 dark:bg-green-600 text-white dark:text-black rounded-xl font-bold active:scale-95 transition-all shadow-lg shadow-blue-500/20">Simpan Produk</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div id="modalEditProduk" class="fixed inset-0 z-[60] hidden overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-slate-950/50 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modalEditProduk').classList.add('hidden')"></div>
            <div class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-white dark:border-gray-800">
                <div class="bg-blue-700 dark:bg-black px-6 py-4 flex justify-between items-center border-b dark:border-green-500/20">
                    <h3 class="text-lg font-bold text-white dark:text-yellow-400 uppercase tracking-widest"><i class="fas fa-edit mr-2"></i> Edit Produk</h3>
                    <button onclick="document.getElementById('modalEditProduk').classList.add('hidden')" class="text-white/70 hover:text-white"><i class="fas fa-times text-xl"></i></button>
                </div>
                <div class="p-8">@include('admin.components.edit-produk')</div>
                <div class="bg-slate-50 dark:bg-gray-800/50 px-8 py-4 flex justify-end gap-3 border-t dark:border-gray-800">
                    <button type="button" onclick="document.getElementById('modalEditProduk').classList.add('hidden')" class="px-6 py-2 text-slate-600 dark:text-slate-400 font-bold">Batal</button>
                    <button type="submit" form="formEditProduk" class="px-8 py-2 bg-blue-700 dark:bg-green-600 text-white dark:text-black rounded-xl font-bold active:scale-95 transition-all shadow-lg shadow-blue-500/20">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function editProduk(id) {
            const products = @json($products);
            const item = products.find(p => p.id === id);

            if (item) {
                // Set form action dinamis
                document.getElementById('formEditProduk').action = `/produk/update/${id}`;
                
                // Isi field form edit
                document.getElementById('edit_nama_produk').value = item.nama_produk;
                document.getElementById('edit_kategori').value = item.kategori;
                document.getElementById('edit_harga_beli').value = item.harga_beli;
                document.getElementById('edit_harga_jual').value = item.harga_jual;
                document.getElementById('edit_stok_minimal').value = item.stok_minimal;
                
                // Update display stok (Sesuai perbaikan sebelumnya)
                if(document.getElementById('display_stok_aktif')) {
                    document.getElementById('display_stok_aktif').innerText = item.stok_aktif ?? 0;
                }
                if(document.getElementById('edit_tambah_stok')) {
                    document.getElementById('edit_tambah_stok').value = 0;
                }

                // Tampilkan modal
                document.getElementById('modalEditProduk').classList.remove('hidden');
            }
        }
    </script>
    @endpush
</x-app-layout>