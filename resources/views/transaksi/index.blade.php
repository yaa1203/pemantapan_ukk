<x-app-layout>
    <div class="min-h-screen bg-gray-50 px-6 py-10">
        <div class="max-w-5xl mx-auto">

            {{-- HEADER --}}
            <div class="flex items-end justify-between mb-10">
                <div>
                    <p class="text-xs font-semibold tracking-widest text-indigo-500 uppercase mb-1">Manajemen Penjualan</p>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Transaksi</h1>
                    <p class="text-sm text-gray-400 mt-1">Daftar seluruh transaksi yang tercatat</p>
                </div>
                <a href="/transaksi/create"
                    class="group flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-md shadow-indigo-200">
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-90 duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Transaksi
                </a>
            </div>

            {{-- SUMMARY CARDS --}}
            <div class="grid grid-cols-3 gap-4 mb-8">
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-semibold">Total Transaksi</p>
                    <p class="text-3xl font-extrabold text-gray-900">{{ $data->count() }}</p>
                </div>
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-semibold">Total Item Terjual</p>
                    <p class="text-3xl font-extrabold text-gray-900">{{ $data->sum('jumlah') }}</p>
                </div>
                <div class="bg-indigo-600 rounded-2xl p-5 shadow-md shadow-indigo-200">
                    <p class="text-xs text-indigo-200 uppercase tracking-widest mb-2 font-semibold">Total Pendapatan</p>
                    <p class="text-2xl font-extrabold text-white">
                        Rp {{ number_format($data->sum('total_harga'), 0, ',', '.') }}
                    </p>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">

                {{-- Table Header --}}
                <div class="grid grid-cols-5 px-6 py-3 border-b border-gray-100 bg-gray-50">
                    <div class="col-span-2 text-xs font-bold text-gray-400 uppercase tracking-widest">Barang</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Gerai</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Jumlah</div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Total Harga</div>
                </div>

                {{-- Table Rows --}}
                @forelse($data as $d)
                <div class="grid grid-cols-5 px-6 py-4 border-b border-gray-50 hover:bg-indigo-50/50 transition-colors duration-150 items-center">

                    {{-- Barang --}}
                    <div class="col-span-2 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0v10l-8 4m0-10L4 7m8 4v10"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-800">{{ $d->barang->nama_barang }}</span>
                    </div>

                    {{-- Gerai --}}
                    <div>
                        <span class="inline-flex items-center text-xs font-medium text-indigo-600 bg-indigo-50 border border-indigo-100 px-2.5 py-1 rounded-lg">
                            {{ $d->gerai->nama }}
                        </span>
                    </div>

                    {{-- Jumlah --}}
                    <div class="text-center">
                        <span class="text-sm font-bold text-gray-800">{{ $d->jumlah }}</span>
                        <span class="text-xs text-gray-400 ml-1">pcs</span>
                    </div>

                    {{-- Total --}}
                    <div class="text-right">
                        <span class="text-sm font-bold text-emerald-600">
                            Rp {{ number_format($d->total_harga, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="py-20 text-center">
                    <svg class="w-10 h-10 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="text-gray-400 text-sm">Belum ada transaksi</p>
                    <a href="/transaksi/create" class="text-indigo-500 hover:text-indigo-600 text-sm mt-1 inline-block transition-colors">Buat transaksi pertama →</a>
                </div>
                @endforelse

                {{-- Grand Total Row --}}
                @if($data->count() > 0)
                <div class="grid grid-cols-5 px-6 py-4 bg-gray-50 border-t border-gray-100 items-center">
                    <div class="col-span-2 text-xs font-bold text-gray-400 uppercase tracking-widest">Grand Total</div>
                    <div></div>
                    <div class="text-center text-sm font-black text-gray-800">{{ $data->sum('jumlah') }}</div>
                    <div class="text-right text-sm font-black text-emerald-600">
                        Rp {{ number_format($data->sum('total_harga'), 0, ',', '.') }}
                    </div>
                </div>
                @endif
            </div>

            <p class="text-center text-xs text-gray-400 mt-6">{{ $data->count() }} transaksi ditemukan</p>
        </div>
    </div>
</x-app-layout>