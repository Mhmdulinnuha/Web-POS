<form id="formEditProduk" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Nama
                Produk</label>
            <input type="text" name="nama_produk" id="edit_nama_produk" required
                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Kategori
                Produk</label>
            <select name="kategori" id="edit_kategori" required
                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm appearance-none">
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
                <option value="bahan-baku">Bahan Baku</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Harga
                Beli</label>
            <input type="number" name="harga_beli" id="edit_harga_beli" required
                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-green-600 dark:text-green-400 uppercase tracking-widest ml-1">Harga
                Jual</label>
            <input type="number" name="harga_jual" id="edit_harga_jual" required
                class="w-full px-4 py-3 bg-white dark:bg-slate-800 border-2 border-green-100 dark:border-green-900/30 rounded-2xl focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/20 focus:border-green-500 outline-none transition-all dark:text-white text-sm font-bold">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-blue-600 dark:text-blue-400 uppercase tracking-widest ml-1">Stok Saat
                Ini</label>
            <div
                class="w-full px-4 py-3 bg-slate-100 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-700 rounded-2xl text-slate-500 dark:text-slate-400 text-sm flex items-center">
                <span id="display_stok_aktif">0</span> <span class="ml-1">Unit</span>
                <input type="hidden" id="edit_stok_aktif">
            </div>
            <p class="text-[10px] text-slate-400 mt-1 italic">*Jumlah stok yang tercatat sekarang.</p>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-yellow-500 uppercase tracking-widest ml-1">Tambah / Restock (+)</label>
            <input type="number" name="tambah_stok" id="edit_tambah_stok" min="0" value="0"
                class="w-full px-4 py-3 bg-yellow-50 dark:bg-yellow-900/10 border-2 border-yellow-100 dark:border-yellow-900/30 rounded-2xl focus:ring-4 focus:ring-yellow-100 dark:focus:ring-yellow-900/20 focus:border-yellow-500 outline-none transition-all dark:text-white text-sm font-black">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-red-500 dark:text-red-400 uppercase tracking-widest ml-1">Min. Stok
                (Alert)</label>
            <input type="number" name="stok_minimal" id="edit_stok_minimal" required
                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-red-100 dark:focus:ring-red-900/10 focus:border-red-500 outline-none transition-all dark:text-white text-sm">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Update
                Foto</label>
            <input type="file" name="foto_produk"
                class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 dark:file:bg-gray-700 dark:file:text-gray-200">
        </div>
    </div>
</form>