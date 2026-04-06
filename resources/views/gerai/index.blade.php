<x-app-layout>
    <div class="min-h-screen bg-gray-50 px-6 py-10">
        <div class="max-w-5xl mx-auto">

            {{-- HEADER --}}
            <div class="flex items-end justify-between mb-10">
                <div>
                    <p class="text-xs font-semibold tracking-widest text-indigo-500 uppercase mb-1">Manajemen Toko</p>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Data Gerai</h1>
                    <p class="text-sm text-gray-400 mt-1">Daftar seluruh gerai yang terdaftar</p>
                </div>
                @if(auth()->user()->role == 'admin')
                    <a href="/gerai/create"
                        class="group flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-md shadow-indigo-200">
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-90 duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Gerai
                    </a>
                @endif
            </div>

            {{-- SUMMARY CARD --}}
            <div class="grid grid-cols-3 gap-4 mb-8">
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-semibold">Total Gerai</p>
                    <p class="text-3xl font-extrabold text-gray-900">{{ $data->count() }}</p>
                </div>
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-semibold">Total Kota</p>
                    <p class="text-3xl font-extrabold text-gray-900">{{ $data->unique('kota')->count() }}</p>
                </div>
                <div class="bg-indigo-600 rounded-2xl p-5 shadow-md shadow-indigo-200">
                    <p class="text-xs text-indigo-200 uppercase tracking-widest mb-2 font-semibold">Kota Terbanyak</p>
                    <p class="text-2xl font-extrabold text-white truncate">
                        {{ $data->groupBy('kota')->sortByDesc(fn($g) => $g->count())->keys()->first() ?? '-' }}
                    </p>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">

                {{-- Header --}}
                <div class="grid grid-cols-4 px-6 py-3 border-b border-gray-100 bg-gray-50">
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Nama Gerai</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Alamat</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Kota</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Telepon</div>
                </div>

                {{-- Rows --}}
                @forelse($data as $g)
                <div class="grid grid-cols-4 px-6 py-4 border-b border-gray-50 hover:bg-indigo-50/50 transition-colors duration-150 items-center">

                    {{-- Nama --}}
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9m-7-7l7 7m-7-7v7h7"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-800">{{ $g->nama }}</span>
                    </div>

                    {{-- Alamat --}}
                    <div class="text-sm text-gray-500 pr-4 truncate">
                        {{ $g->alamat }}
                    </div>

                    {{-- Kota --}}
                    <div class="text-center">
                        <span class="inline-flex items-center text-xs font-medium text-indigo-600 bg-indigo-50 border border-indigo-100 px-2.5 py-1 rounded-lg">
                            {{ $g->kota }}
                        </span>
                    </div>

                    {{-- Telepon --}}
                    <div class="text-right">
                        <a href="tel:{{ $g->telepon }}"
                            class="inline-flex items-center gap-1.5 text-sm text-gray-600 hover:text-indigo-600 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            {{ $g->telepon }}
                        </a>
                    </div>
                </div>
                @empty
                <div class="py-20 text-center">
                    <svg class="w-10 h-10 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9m-7-7l7 7m-7-7v7h7"/>
                    </svg>
                    <p class="text-gray-400 text-sm">Belum ada gerai terdaftar</p>
                    @if(auth()->user()->role == 'admin')
                        <a href="/gerai/create" class="text-indigo-500 hover:text-indigo-600 text-sm mt-1 inline-block transition-colors">Tambah gerai pertama →</a>
                    @endif
                </div>
                @endforelse
            </div>

            <p class="text-center text-xs text-gray-400 mt-6">{{ $data->count() }} gerai ditemukan</p>
        </div>
    </div>
</x-app-layout>