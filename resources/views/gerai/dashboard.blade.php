<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Gerai</h1>

        <p class="mb-4">Selamat datang, {{ auth()->user()->name }}</p>

        <!-- CARD -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-purple-500 p-4 rounded shadow text-white">
                <h2 class="text-lg font-semibold">Transaksi</h2>
                <p>Lakukan penjualan</p>
            </div>

            <div class="bg-green-500 p-4 rounded shadow text-white">
                <h2 class="text-lg font-semibold">Riwayat Penjualan</h2>
                <p>Lihat data transaksi</p>
            </div>

            <div class="bg-blue-500 p-4 rounded shadow text-white">
                <h2 class="text-lg font-semibold">Stok Barang</h2>
                <p>Cek stok tersedia</p>
            </div>
        </div>
    </div>
</x-app-layout>