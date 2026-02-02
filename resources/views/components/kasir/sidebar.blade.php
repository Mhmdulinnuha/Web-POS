<button data-drawer-target="sidebar-kasir" data-drawer-toggle="sidebar-kasir" aria-controls="sidebar-kasir" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-[#0d47a1] rounded-lg sm:hidden hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-200 fixed top-2 left-2 z-50 bg-white shadow-md border border-blue-100">
    <i class="fas fa-bars text-xl"></i>
</button>

<aside id="sidebar-kasir" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-[#0d47a1] border-r border-blue-800 shadow-2xl" aria-label="Sidebar">
    <div class="h-full px-4 py-8 overflow-y-auto flex flex-col justify-between">
        <div>
            {{-- Logo Area --}}
            <div class="flex flex-col items-center mb-10 text-center">
                <div class="w-16 h-16 bg-yellow-400 rounded-2xl flex items-center justify-center mb-3 shadow-lg shadow-blue-900/50 transform rotate-3">
                    <i class="fas fa-cash-register text-[#0d47a1] text-3xl"></i>
                </div>
                <h1 class="text-white font-black text-xl tracking-wider uppercase">SmartPOS</h1>
                <span class="text-yellow-400 text-[10px] font-bold tracking-[0.2em] uppercase">Kasir Edition</span>
                <div class="w-full h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent mt-6 opacity-30"></div>
            </div>

            {{-- Navigation Links --}}
            <ul class="space-y-3 font-semibold">
                <li>
                    <a href="{{ route('kasir.dashboardksr') }}" 
                       class="flex items-center p-3 rounded-xl transition-all group {{ request()->routeIs('kasir.dashboardksr') ? 'bg-yellow-400 text-[#0d47a1] shadow-lg' : 'text-blue-100 hover:bg-blue-800' }}">
                        <i class="fas fa-shopping-cart w-6 text-lg"></i>
                        <span class="ms-3">Transaksi Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-blue-100 hover:bg-blue-800 rounded-xl group transition-all">
                        <i class="fas fa-history w-6 text-lg opacity-70 group-hover:opacity-100"></i>
                        <span class="ms-3">Riwayat Jual</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-blue-100 hover:bg-blue-800 rounded-xl group transition-all">
                        <i class="fas fa-user-clock w-6 text-lg opacity-70 group-hover:opacity-100"></i>
                        <span class="ms-3">Absensi</span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- User Info & Logout --}}
        <div class="pt-4 border-t border-blue-700/50 space-y-4">
            {{-- Dynamic User Card --}}
            <div class="bg-blue-900/50 p-4 rounded-2xl border border-blue-700 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center text-[#0d47a1] font-bold shadow-inner">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-white text-xs font-bold truncate">{{ Auth::user()->name }}</p>
                    <p class="text-blue-400 text-[10px] uppercase tracking-tighter">Kasir On-Duty</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 p-3 text-red-400 hover:text-white hover:bg-red-500/20 rounded-xl transition-all font-bold text-xs uppercase tracking-widest border border-transparent hover:border-red-500/50">
                    <i class="fas fa-power-off"></i>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </div>
    </div>
</aside>