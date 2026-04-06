<x-app-layout>
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>

    <div class="mt-4">
        <p>Selamat datang, {{ auth()->user()->name }}</p>
        <p>Role: ADMIN</p>
    </div>

    <div class="mt-6 space-y-2">
        <a href="#" class="block bg-blue-500 text-white px-4 py-2 rounded">Kelola User</a>
        <a href="#" class="block bg-green-500 text-white px-4 py-2 rounded">Laporan</a>
    </div>
</x-app-layout>