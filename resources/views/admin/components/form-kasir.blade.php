@if ($errors->any())
    <div class="p-3 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="formTambahKasir" method="POST" action="{{ route('kasir.store') }}" class="space-y-5">
    @csrf
    <div class="space-y-2">
        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
        <input type="text" name="name" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" placeholder="Nama Kasir">
    </div>

    <div class="space-y-2">
        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Email / Username</label>
        <input type="email" name="email" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" placeholder="username@pos.com">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">Password Default</label>
            <input type="password" name="password" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" value="123456">
        </div>
        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest ml-1">ID Pegawai</label>
            <input type="text" name="employee_id" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl focus:ring-4 focus:ring-blue-100 dark:focus:ring-green-900/20 focus:border-blue-600 dark:focus:border-green-500 outline-none transition-all dark:text-white text-sm" placeholder="KSR-001">
        </div>
    </div>
</form>