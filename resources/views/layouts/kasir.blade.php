<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-50">

<x-kasir.sidebar />

<div class="sm:ml-64 min-h-screen">
    <header class="bg-white border-b py-4 px-6 sticky top-0 z-30">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-gray-800">Panel Transaksi</h2>
            <div class="text-sm text-gray-500 font-medium">
                {{ now()->format('l, d F Y') }}
            </div>
        </div>
    </header>

    <main class="p-6">
        @yield('content')
    </main>
</div>


<button id="cartBtn"
    class="fixed bottom-8 right-8 w-20 h-20 bg-yellow-400 hover:bg-[#0d47a1]
    hover:text-yellow-400 text-[#0d47a1]
    rounded-full shadow-xl flex items-center justify-center border-4 border-white
    z-50 transition-all hover:scale-110 active:scale-95">

    <div class="relative">
        <i class="fas fa-shopping-cart text-3xl"></i>
        <span id="cartBadge"
            class="absolute -top-4 -right-4 bg-red-600 text-white text-xs font-bold
            w-7 h-7 flex items-center justify-center rounded-full border-2 border-white">
            0
        </span>
    </div>
</button>


<div id="cartBackdrop"
     class="fixed inset-0 bg-black/40 hidden z-40"></div>


<div id="cartPopup"
    class="fixed bottom-0 right-0 w-full sm:w-[420px] h-[70vh] bg-white z-50
    rounded-t-2xl sm:rounded-tl-2xl shadow-2xl
    translate-y-full transition-transform duration-300">

    <!-- Header -->
    <div class="flex items-center justify-between p-4 border-b">
        <h2 class="text-lg font-bold">🛒 Keranjang Belanja</h2>
        <button id="closeCart" class="text-gray-500 hover:text-red-500 text-xl">✕</button>
    </div>

    <!-- List Item -->
    <div id="cartItems"
     class="p-4 space-y-4 overflow-y-auto h-[calc(70vh-160px)]">

    @php
    $total = 0;
@endphp

@forelse($cartItems as $item)
    @php
        $subtotal = $item->qty * $item->product->harga_jual;
        $total += $subtotal;
    @endphp

    <div class="flex justify-between items-center border-b pb-2">
        <div>
            <p class="font-semibold">{{ $item->product->nama_produk }}</p>
            <p class="text-sm text-gray-500">
                {{ $item->qty }} x Rp {{ number_format($item->product->harga_jual) }}
            </p>
        </div>
        <div class="font-bold">
            Rp {{ number_format($subtotal) }}
        </div>
    </div>
@empty
    <p class="text-gray-400 text-center">Keranjang kosong</p>
@endforelse

</div>

    <!-- Footer -->
    <div class="p-4 border-t">
    <div class="flex justify-between mb-4 font-bold">
        <span>Total</span>
        <span id="cartTotal">Rp {{ number_format($total ?? 0) }}</span>
    </div>
    <button class="w-full bg-[#0d47a1] text-white py-3 rounded-lg hover:bg-blue-800">
        Checkout
    </button>
</div>
</div>

@stack('scripts')
</body>
</html>


<script>
function loadCart() {
    fetch('/cart/data')
        .then(res => res.json())
        .then(data => {

            const cartItems = document.getElementById('cartItems');
            const cartBadge = document.getElementById('cartBadge');
            const cartTotal = document.getElementById('cartTotal');

            cartItems.innerHTML = '';
            let total = 0;
            let totalQty = 0;

            data.forEach(item => {
                total += item.qty * item.harga_jual;
                totalQty += item.qty;

                cartItems.innerHTML += `
                    <div class="flex justify-between items-center border-b pb-2">
                        <div>
                            <p class="font-semibold">${item.product.nama_produk}</p>
                            <p class="text-sm text-gray-500">
                                ${item.qty} x Rp ${item.harga_jual}
                            </p>
                        </div>
                        <div class="font-bold">
                            Rp ${item.qty * item.harga_jual}
                        </div>
                    </div>
                `;
            });

            cartTotal.innerText = "Rp " + total.toLocaleString('id-ID');
            cartBadge.innerText = totalQty; 
        });
}

document.addEventListener("DOMContentLoaded", loadCart);
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const cartBtn = document.getElementById('cartBtn');
    const cartPopup = document.getElementById('cartPopup');
    const cartBackdrop = document.getElementById('cartBackdrop');
    const closeCart = document.getElementById('closeCart');

    cartBtn.addEventListener('click', function () {
        cartPopup.classList.remove('translate-y-full');
        cartBackdrop.classList.remove('hidden');
        loadCart(); 
    });

    closeCart.addEventListener('click', function () {
        cartPopup.classList.add('translate-y-full');
        cartBackdrop.classList.add('hidden');
    });

    cartBackdrop.addEventListener('click', function () {
        cartPopup.classList.add('translate-y-full');
        cartBackdrop.classList.add('hidden');
    });

    
});
</script>


<script>
function updateCartBadge() {
    fetch('/cart/data')
        .then(res => res.json())
        .then(data => {

            const cartBadge = document.getElementById('cartBadge');

            let totalQty = 0;

            data.forEach(item => {
                totalQty += item.qty;
            });

            if (totalQty > 0) {
                cartBadge.innerText = totalQty;
                cartBadge.style.display = 'flex';
            } else {
                cartBadge.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Cart badge error:', error);
        });
}

// Load saat halaman dibuka
document.addEventListener("DOMContentLoaded", function () {
    updateCartBadge();
});
</script>


