<x-app-layout>
    <div class="p-6 space-y-6">

        {{-- Header --}}
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Gudang</h1>
            <p class="text-sm text-gray-500">
                Selamat datang,
                <span class="font-semibold text-amber-700">{{ auth()->user()->name }}</span> 👋
            </p>
        </div>

        {{-- Welcome Banner --}}
        <div class="bg-amber-800 text-white p-6 rounded-2xl flex items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-semibold">Sistem Manajemen Gudang</h2>
                <p class="text-sm text-amber-200 mt-1">
                    Kelola stok dan distribusi barang dengan cepat dan efisien.
                </p>
            </div>
            <div class="bg-white/10 rounded-xl p-3 flex-shrink-0">
                <svg class="w-7 h-7 text-amber-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
        </div>

        {{-- Stat Cards --}}
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-500 mb-1">Total Barang</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalBarang }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-500 mb-1">Stok Masuk</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalStokMasuk }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-500 mb-1">Stok Keluar</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalStokKeluar }}</p>
            </div>
        </div>

        {{-- Modul dengan CRUD --}}
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Modul dengan CRUD</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Data Barang --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-amber-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Data Barang</p>
                            <p class="text-xs text-gray-400">Stok dan katalog barang</p>
                        </div>
                        <span class="text-xs font-bold text-amber-800 bg-amber-50 px-2.5 py-1 rounded-full">CRUD</span>
                    </div>
                    <div class="border-t border-gray-100 pt-4 flex gap-2">
                        <a href="{{ url('/barang') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold bg-amber-800 text-white px-3 py-2 rounded-lg hover:bg-amber-900 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            Lihat Semua
                        </a>
                        <a href="{{ url('/barang/create') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-50 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Tambah Baru
                        </a>
                    </div>
                </div>

                {{-- Stok Masuk --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Stok Masuk</p>
                            <p class="text-xs text-gray-400">Tambah stok barang gudang</p>
                        </div>
                        <span class="text-xs font-bold text-emerald-800 bg-emerald-50 px-2.5 py-1 rounded-full">CRUD</span>
                    </div>
                    <div class="border-t border-gray-100 pt-4 flex gap-2">
                        <a href="{{ url('/stok-masuk') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold bg-emerald-700 text-white px-3 py-2 rounded-lg hover:bg-emerald-800 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            Lihat Semua
                        </a>
                        <a href="{{ url('/stok-masuk/create') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-50 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Tambah Baru
                        </a>
                    </div>
                </div>

            </div>
        </div>

        {{-- Modul Lainnya (Read Only) --}}
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Modul Lainnya</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Stok Keluar --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 10H11a8 8 0 00-8 8v2m18-10l-6 6m6-6l-6-6"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Stok Keluar</p>
                            <p class="text-xs text-gray-400">Catat barang keluar</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <a href="{{ url('/stok-keluar') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-50 transition w-fit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Lihat Data
                        </a>
                    </div>
                </div>

                {{-- Laporan --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Laporan</p>
                            <p class="text-xs text-gray-400">Rekap stok & mutasi barang</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <a href="{{ url('/laporan-gudang') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-50 transition w-fit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Lihat Laporan
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>