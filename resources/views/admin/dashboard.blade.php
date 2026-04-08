<x-app-layout>
    <div class="p-6 space-y-6">

        {{-- Header --}}
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
            <p class="text-sm text-gray-500">
                Selamat datang,
                <span class="font-semibold text-blue-600">{{ auth()->user()->name }}</span> 👋
            </p>
        </div>

        {{-- Welcome Banner --}}
        <div class="bg-blue-700 text-white p-6 rounded-2xl flex items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-semibold">Toko Indonesia System</h2>
                <p class="text-sm text-blue-200 mt-1">
                    Kelola semua data toko dengan cepat dan efisien dalam satu dashboard.
                </p>
            </div>
            <div class="bg-white/10 rounded-xl p-3 flex-shrink-0">
                <svg class="w-7 h-7 text-blue-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
        </div>

        {{-- Stat Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-500 mb-1">Total Supplier</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalSupplier }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-500 mb-1">Total Gerai</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalGerai }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-500 mb-1">Total Barang</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalBarang }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-500 mb-1">Distribusi</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalDistribusi }}</p>
            </div>
        </div>

        {{-- Modul dengan CRUD --}}
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Modul dengan CRUD</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Supplier --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Supplier</p>
                            <p class="text-xs text-gray-400">Manajemen data pemasok barang</p>
                        </div>
                        <span class="text-xs font-bold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">CRUD</span>
                    </div>
                    <div class="border-t border-gray-100 pt-4 flex gap-2">
                        <a href="{{ url('/supplier') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold bg-blue-700 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            Lihat Semua
                        </a>
                        <a href="{{ url('/supplier/create') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-50 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Tambah Baru
                        </a>
                    </div>
                </div>

                {{-- Gerai --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Gerai</p>
                            <p class="text-xs text-gray-400">Manajemen data gerai / cabang</p>
                        </div>
                        <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full">CRUD</span>
                    </div>
                    <div class="border-t border-gray-100 pt-4 flex gap-2">
                        <a href="{{ url('/gerai') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold bg-emerald-700 text-white px-3 py-2 rounded-lg hover:bg-emerald-800 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            Lihat Semua
                        </a>
                        <a href="{{ url('/gerai/create') }}"
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Data Barang --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Data Barang</p>
                            <p class="text-xs text-gray-400">Stok dan katalog barang</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <a href="{{ url('/benda') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-50 transition w-fit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Lihat Data
                        </a>
                    </div>
                </div>

                {{-- Distribusi --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Distribusi</p>
                            <p class="text-xs text-gray-400">Riwayat distribusi ke gerai</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <a href="{{ url('/distribusis') }}"
                           class="flex items-center gap-1.5 text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-50 transition w-fit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Lihat Data
                        </a>
                    </div>
                </div>

                {{-- Laporan --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-[15px] font-semibold text-gray-800">Laporan</p>
                            <p class="text-xs text-gray-400">Laporan penjualan & distribusi</p>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <a href="{{ url('/laporan') }}"
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