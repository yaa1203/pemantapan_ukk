<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Gudang</h1>

        <p class="mb-4">Selamat datang, {{ auth()->user()->name }}</p>

        <!-- CARD -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-yellow-400 p-4 rounded shadow text-white">
                <h2 class="text-lg font-semibold">Data Barang</h2>
                <p>Kelola semua barang</p>
            </div>

            <div class="bg-blue-400 p-4 rounded shadow text-white">
                <h2 class="text-lg font-semibold">Stok Masuk</h2>
                <p>Tambah stok barang</p>
            </div>

            <div class="bg-red-400 p-4 rounded shadow text-white">
                <h2 class="text-lg font-semibold">Stok Keluar</h2>
                <p>Catat barang keluar</p>
            </div>
        </div>
    </div>
</x-app-layout>