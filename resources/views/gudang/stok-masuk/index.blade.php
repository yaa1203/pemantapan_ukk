<x-app-layout>
    <div class="p-6 space-y-6">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Stok Masuk</h1>
                <p class="text-sm text-gray-500">Daftar semua data stok masuk gudang</p>
            </div>
            <a href="{{ route('stok-masuk.create') }}"
               class="flex items-center gap-1.5 text-xs font-semibold bg-amber-800 text-white px-4 py-2 rounded-lg hover:bg-amber-900 transition">
                + Tambah Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-left">Barang</th>
                        <th class="px-4 py-3 text-left">Supplier</th>
                        <th class="px-4 py-3 text-left">Jumlah</th>
                        <th class="px-4 py-3 text-left">Keterangan</th>
                        <th class="px-4 py-3 text-left">Dicatat Oleh</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($data as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $item->tanggal->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $item->barang->nama_barang ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $item->supplier->nama ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                +{{ $item->jumlah }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-500">{{ $item->keterangan ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $item->user->name ?? '-' }}</td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('stok-masuk.edit', $item) }}"
                               class="text-xs font-semibold border border-gray-200 text-gray-600 px-3 py-1.5 rounded-lg hover:bg-gray-50 transition">
                                Edit
                            </a>
                            <form action="{{ route('stok-masuk.destroy', $item) }}" method="POST"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="text-xs font-semibold border border-red-200 text-red-600 px-3 py-1.5 rounded-lg hover:bg-red-50 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-400 text-sm">Belum ada data stok masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>{{ $data->links() }}</div>
    </div>
</x-app-layout>