<x-app-layout>
    <div class="p-6 space-y-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">Laporan Gudang</h1>
            <p class="text-sm text-gray-500">Rekap stok dan riwayat transaksi barang</p>
        </div>

        {{-- Filter Tanggal --}}
        <form method="GET" action="{{ route('laporan-gudang.index') }}"
              class="bg-white border border-gray-100 rounded-2xl p-5 flex flex-wrap items-end gap-4">
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Dari Tanggal</label>
                <input type="date" name="dari" value="{{ $dari }}"
                       class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-300">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Sampai Tanggal</label>
                <input type="date" name="sampai" value="{{ $sampai }}"
                       class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-300">
            </div>
            <button type="submit"
                    class="text-sm font-semibold bg-amber-800 text-white px-5 py-2 rounded-xl hover:bg-amber-900 transition">
                Tampilkan
            </button>
        </form>

        {{-- Rekap Per Barang --}}
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Rekap Per Barang</p>
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Nama Barang</th>
                            <th class="px-4 py-3 text-center">Total Masuk</th>
                            <th class="px-4 py-3 text-center">Total Keluar</th>
                            <th class="px-4 py-3 text-center">Selisih</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($rekap as $i => $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-400">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $item->nama_barang }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    +{{ $item->total_masuk }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-red-50 text-red-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    -{{ $item->total_keluar }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-full
                                    {{ $item->selisih >= 0 ? 'bg-blue-50 text-blue-700' : 'bg-red-50 text-red-700' }}">
                                    {{ $item->selisih >= 0 ? '+' : '' }}{{ $item->selisih }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-400 text-sm">
                                Tidak ada data pada rentang tanggal ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Riwayat Transaksi --}}
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Riwayat Transaksi</p>
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left">Tanggal</th>
                            <th class="px-4 py-3 text-left">Jenis</th>
                            <th class="px-4 py-3 text-left">Barang</th>
                            <th class="px-4 py-3 text-left">Supplier / Gerai</th>
                            <th class="px-4 py-3 text-center">Jumlah</th>
                            <th class="px-4 py-3 text-left">Keterangan</th>
                            <th class="px-4 py-3 text-left">Dicatat Oleh</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($riwayat as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-500">
                                {{ \Carbon\Carbon::parse($item['tanggal'])->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-full
                                    {{ $item['jenis'] === 'Masuk' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                                    {{ $item['jenis'] }}
                                </span>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $item['barang'] }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $item['pihak'] }}</td>
                            <td class="px-4 py-3 text-center font-medium text-gray-800">{{ $item['jumlah'] }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $item['ket'] ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $item['user'] }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-400 text-sm">
                                Tidak ada transaksi pada rentang tanggal ini
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>