<x-app-layout>
    <x-slot name="header">Pengaturan Sistem & Toko</x-slot>

    <div class="space-y-6 pb-20">
        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="p-4 bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 rounded-xl flex items-center gap-3 shadow-sm">
                <i class="fas fa-check-circle"></i>
                <span class="text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Menu Navigasi Tab --}}
            <div class="lg:col-span-1 space-y-4">
                <div class="bg-white dark:bg-gray-900 p-4 rounded-2xl border border-slate-200 dark:border-gray-800 shadow-sm">
                    <nav class="flex flex-col space-y-2">
                        <button onclick="switchTab('profil', this)"
                            class="tab-btn active-tab flex items-center gap-3 p-3 rounded-xl transition-all font-bold text-sm">
                            <i class="fas fa-store w-5"></i> Profil Toko
                        </button>
                        <button onclick="switchTab('pembayaran', this)"
                            class="tab-btn inactive-tab flex items-center gap-3 p-3 rounded-xl transition-all font-bold text-sm">
                            <i class="fas fa-wallet w-5"></i> Metode Pembayaran
                        </button>
                        <button onclick="switchTab('keamanan', this)"
                            class="tab-btn inactive-tab flex items-center gap-3 p-3 rounded-xl transition-all font-bold text-sm">
                            <i class="fas fa-shield-alt w-5"></i> Keamanan Akun
                        </button>
                    </nav>
                </div>
            </div>

            <div class="lg:col-span-2">
                {{-- TAB 1: PROFIL TOKO --}}
                <div id="tab-profil" class="tab-content block animate-fade-in">
                    <form action="{{ route('setting.updateStore') }}" method="POST"
                        class="bg-white dark:bg-gray-900 rounded-3xl border border-slate-200 dark:border-gray-800 shadow-sm overflow-hidden">
                        @csrf
                        @method('PATCH')

                        <div class="p-8 space-y-6">
                            <h3 class="text-lg font-bold dark:text-yellow-400 uppercase tracking-widest text-blue-700">Identitas Toko</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Nama Toko</label>
                                    <input type="text" name="store_name" value="{{ old('store_name', $user->store_name) }}"
                                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 outline-none transition-all dark:text-white text-sm">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Nama Pemilik/Admin</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 outline-none transition-all dark:text-white text-sm">
                                </div>
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Email Kontak</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 outline-none transition-all dark:text-white text-sm">
                                </div>
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Alamat Lengkap</label>
                                    <textarea name="address" rows="3"
                                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 outline-none transition-all dark:text-white text-sm">{{ old('address', $user->address) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-slate-50 dark:bg-gray-800/50 border-t dark:border-gray-800 text-right">
                            <button type="submit" class="px-8 py-2 bg-blue-700 dark:bg-green-600 text-white dark:text-black rounded-xl font-bold active:scale-95 transition-all shadow-lg shadow-blue-500/20">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- TAB 2: METODE PEMBAYARAN --}}
                <div id="tab-pembayaran" class="tab-content hidden space-y-6 animate-fade-in">
                    <div class="bg-white dark:bg-gray-900 p-6 rounded-3xl border border-slate-200 dark:border-gray-800 shadow-sm">
                        <h3 class="text-sm font-bold dark:text-yellow-400 uppercase tracking-widest mb-4 text-blue-700">Tambah Metode Baru</h3>
                        <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <select name="type" id="pay_type" onchange="adjustForm()"
                                    class="px-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl text-sm dark:text-white outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="bank">Bank Transfer</option>
                                    <option value="ewallet">E-Wallet</option>
                                    <option value="qris">QRIS</option>
                                </select>
                                <input type="text" name="provider" placeholder="Provider (BCA / Dana / QRIS)" required
                                    class="px-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl text-sm dark:text-white outline-none">
                                <input type="text" name="account_name" placeholder="Nama Pemilik" required
                                    class="px-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl text-sm dark:text-white outline-none">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" id="input_number" name="account_number" placeholder="Nomor Rekening" required
                                    class="px-4 py-3 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl text-sm dark:text-white outline-none">
                                <div id="qr_upload" class="hidden flex items-center gap-3 px-4 py-2 bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl">
                                    <i class="fas fa-image text-slate-400"></i>
                                    <input type="file" name="qr_image" class="text-xs text-slate-500 file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700">
                                </div>
                            </div>
                            <button type="submit" class="w-full py-3 bg-blue-700 dark:bg-green-600 text-white dark:text-black font-bold rounded-2xl shadow-lg transition-all active:scale-95">
                                <i class="fas fa-plus-circle mr-2"></i> Simpan Metode Pembayaran
                            </button>
                        </form>
                    </div>

                    {{-- List Card (Scrollable) --}}
                    <div class="max-h-[500px] overflow-y-auto space-y-3 pr-2 custom-scrollbar">
                        @forelse($payments ?? [] as $pay)
                            <div class="bg-white dark:bg-gray-900 p-5 rounded-2xl border border-slate-200 dark:border-gray-800 flex items-center justify-between shadow-sm hover:border-blue-300 dark:hover:border-green-800 transition-all">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-slate-100 dark:bg-gray-800 rounded-xl flex items-center justify-center text-xl">
                                        @if($pay->type == 'bank') <i class="fas fa-university text-blue-500"></i>
                                        @elseif($pay->type == 'ewallet') <i class="fas fa-mobile-alt text-green-500"></i>
                                        @else <i class="fas fa-qrcode text-red-500"></i> @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-sm dark:text-white uppercase">{{ $pay->provider }}</h4>
                                        <p class="text-xs text-slate-500">{{ $pay->account_number }} a/n {{ $pay->account_name }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    @if($pay->qr_image)
                                        <button onclick="window.open('{{ asset('storage/' . $pay->qr_image) }}')"
                                            class="p-2 text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all" title="Lihat QR">
                                            <i class="fas fa-qrcode text-lg"></i>
                                        </button>
                                    @endif
                                    <form action="{{ route('payment.destroy', $pay->id) }}" method="POST" onsubmit="return confirm('Hapus metode ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all">
                                            <i class="fas fa-trash-alt text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12 bg-slate-50 dark:bg-gray-800/30 rounded-3xl border-2 border-dashed border-slate-200 dark:border-gray-700">
                                <i class="fas fa-credit-card text-4xl text-slate-200 dark:text-gray-700 mb-3 block"></i>
                                <p class="text-slate-400 text-xs italic">Belum ada metode pembayaran yang ditambahkan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Fungsi Ganti Tab
            function switchTab(tabName, btn) {
                document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
                document.getElementById('tab-' + tabName).classList.remove('hidden');

                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active-tab');
                    b.classList.add('inactive-tab');
                });
                btn.classList.add('active-tab');
                btn.classList.remove('inactive-tab');
            }

            // Fungsi Form Dinamis
            function adjustForm() {
                const type = document.getElementById('pay_type').value;
                const inputNumber = document.getElementById('input_number');
                const qrUpload = document.getElementById('qr_upload');

                if (type === 'qris' || type === 'ewallet') {
                    qrUpload.classList.remove('hidden');
                    inputNumber.placeholder = (type === 'qris') ? "ID Merchant (Opsional)" : "Nomor HP E-Wallet";
                } else {
                    qrUpload.classList.add('hidden');
                    inputNumber.placeholder = "Nomor Rekening Bank";
                }
            }
        </script>
        <style>
            .active-tab { @apply bg-blue-700 text-white dark:bg-green-600 dark:text-black shadow-lg; }
            .inactive-tab { @apply text-slate-500 hover:bg-slate-100 dark:hover:bg-gray-800; }
            
            /* Custom Scrollbar */
            .custom-scrollbar::-webkit-scrollbar { width: 5px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
            .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; }
        </style>
    @endpush
</x-app-layout>