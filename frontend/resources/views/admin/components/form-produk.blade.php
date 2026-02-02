<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" id="formProduk" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Nama Produk</label>
            <input type="text" name="nama_produk" required 
                class="w-full px-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" 
                placeholder="Contoh: Kopi Gayo Espresso">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Kategori Produk</label>
            <select name="kategori" required 
                class="w-full px-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm appearance-none">
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
                <option value="bahan-baku">Bahan Baku</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Harga Beli (Modal)</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 font-bold text-sm">Rp</span>
                <input type="number" name="harga_beli" required 
                    class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" 
                    placeholder="0">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-green-600 dark:text-green-400 uppercase tracking-widest ml-1">Harga Jual</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-green-500 font-bold text-sm">Rp</span>
                <input type="number" name="harga_jual" required 
                    class="w-full pl-12 pr-4 py-3 bg-white dark:bg-gray-800 border-2 border-green-100 dark:border-green-900/30 rounded-2xl focus:ring-4 focus:ring-green-100 dark:focus:ring-green-900/20 focus:border-green-500 outline-none transition-all dark:text-white text-sm font-bold" 
                    placeholder="0">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-red-500 dark:text-red-400 uppercase tracking-widest ml-1">Min. Stok (Alert)</label>
            <input type="number" name="stok_minimal" required 
                class="w-full px-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl focus:ring-4 focus:ring-red-100 dark:focus:ring-red-900/10 focus:border-red-500 outline-none transition-all dark:text-white text-sm" 
                value="10">
            <p class="text-[10px] text-slate-400 mt-1 italic">*Sistem AI akan memberi notifikasi jika stok di bawah angka ini.</p>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Foto Produk (AI Vision)</label>
            <div class="relative group h-[110px]">
                <input type="file" name="foto_produk" id="foto_produk" class="hidden" accept="image/*" onchange="previewImage(event)">
                <label for="foto_produk" class="flex flex-col items-center justify-center w-full h-full border-2 border-dashed border-slate-200 dark:border-gray-700 rounded-2xl cursor-pointer bg-slate-50 dark:bg-gray-950 hover:bg-slate-100 dark:hover:bg-gray-800 transition-all overflow-hidden">
                    <div id="preview-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6">
                        <i class="fas fa-camera text-2xl text-slate-300 dark:text-gray-600 mb-2"></i>
                        <p class="text-[10px] text-slate-400 uppercase font-bold tracking-tighter">Ambil Foto Produk</p>
                    </div>
                    <img id="img-preview" class="hidden w-full h-full object-cover">
                </label>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('img-preview');
            const placeholder = document.getElementById('preview-placeholder');
            output.src = reader.result;
            output.classList.remove('hidden');
            placeholder.classList.add('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>