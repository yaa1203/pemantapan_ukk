<x-app-layout>
    <div class="min-h-screen bg-gray-50 px-6 py-10">
        <div class="max-w-6xl mx-auto">

            {{-- HEADER --}}
            <div class="flex items-end justify-between mb-10">
                <div>
                    <p class="text-xs font-semibold tracking-widest text-indigo-500 uppercase mb-1">Manajemen Inventaris</p>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Data Barang</h1>
                    <p class="text-sm text-gray-400 mt-1">Daftar seluruh barang yang tersedia</p>
                </div>
                @if(auth()->user()->role == 'gudang')
                    <a href="/barang/create"
                        class="group flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-md shadow-indigo-200">
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-90 duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Barang
                    </a>
                @endif
            </div>

            {{-- SUMMARY CARDS --}}
            <div class="grid grid-cols-3 gap-4 mb-8">
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-semibold">Total Barang</p>
                    <p class="text-3xl font-extrabold text-gray-900">{{ $data->count() }}</p>
                </div>
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-semibold">Total Stok</p>
                    <p class="text-3xl font-extrabold text-gray-900">{{ $data->sum('stok') }}</p>
                </div>
                <div class="bg-indigo-600 rounded-2xl p-5 shadow-md shadow-indigo-200">
                    <p class="text-xs text-indigo-200 uppercase tracking-widest mb-2 font-semibold">Total Nilai Stok</p>
                    <p class="text-2xl font-extrabold text-white">
                        Rp {{ number_format($data->sum(fn($d) => $d->harga * $d->stok), 0, ',', '.') }}
                    </p>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">

                {{-- Header --}}
                <div class="grid {{ auth()->user()->role == 'gudang' ? 'grid-cols-6' : 'grid-cols-5' }} px-6 py-3 border-b border-gray-100 bg-gray-50">
                    <div class="col-span-2 text-xs font-bold text-gray-400 uppercase tracking-widest">Barang</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Harga</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Stok</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Supplier</div>
                    @if(auth()->user()->role == 'gudang')
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</div>
                    @endif
                </div>

                {{-- Rows --}}
                @forelse($data as $d)
                <div class="grid {{ auth()->user()->role == 'gudang' ? 'grid-cols-6' : 'grid-cols-5' }} px-6 py-4 border-b border-gray-50 hover:bg-indigo-50/50 transition-colors duration-150 items-center">

                    {{-- Nama & Kategori --}}
                    <div class="col-span-2 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0v10l-8 4m0-10L4 7m8 4v10"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $d->nama_barang }}</p>
                            <p class="text-xs text-gray-400">{{ $d->kategori }}</p>
                        </div>
                    </div>

                    {{-- Harga --}}
                    <div class="text-sm font-semibold text-gray-700">
                        Rp {{ number_format($d->harga, 0, ',', '.') }}
                    </div>

                    {{-- Stok --}}
                    <div class="text-center">
                        @if($d->stok <= 5)
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-red-600 bg-red-50 border border-red-100 px-2.5 py-1 rounded-lg">
                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                {{ $d->stok }} pcs
                            </span>
                        @elseif($d->stok <= 20)
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-amber-600 bg-amber-50 border border-amber-100 px-2.5 py-1 rounded-lg">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                {{ $d->stok }} pcs
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-600 bg-emerald-50 border border-emerald-100 px-2.5 py-1 rounded-lg">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                {{ $d->stok }} pcs
                            </span>
                        @endif
                    </div>

                    {{-- Supplier --}}
                    <div>
                        <span class="inline-flex items-center text-xs font-medium text-indigo-600 bg-indigo-50 border border-indigo-100 px-2.5 py-1 rounded-lg">
                            {{ $d->supplier->nama }}
                        </span>
                    </div>

                    {{-- Aksi --}}
                    @if(auth()->user()->role == 'gudang')
                    <div class="flex items-center justify-end gap-2">
                        <a href="/barang/edit/{{ $d->id }}"
                            class="flex items-center gap-1 text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 border border-indigo-100 px-3 py-1.5 rounded-lg transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.5 19.213l-4.5 1.5 1.5-4.5L16.862 3.487z"/>
                            </svg>
                            Edit
                        </a>
                        <form action="/barang/{{ $d->id }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center gap-1 text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-100 border border-red-100 px-3 py-1.5 rounded-lg transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                @empty
                <div class="py-20 text-center">
                    <svg class="w-10 h-10 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0v10l-8 4m0-10L4 7m8 4v10"/>
                    </svg>
                    <p class="text-gray-400 text-sm">Belum ada barang</p>
                    @if(auth()->user()->role == 'gudang')
                        <a href="/barang/create" class="text-indigo-500 hover:text-indigo-600 text-sm mt-1 inline-block transition-colors">Tambah barang pertama →</a>
                    @endif
                </div>
                @endforelse
            </div>

            <p class="text-center text-xs text-gray-400 mt-6">{{ $data->count() }} barang ditemukan</p>
        </div>
    </div>
</x-app-layout>