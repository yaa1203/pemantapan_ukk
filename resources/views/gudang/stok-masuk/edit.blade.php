<x-app-layout>
    <div class="p-6 max-w-xl space-y-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Stok Masuk</h1>
            <p class="text-sm text-gray-500">Perbarui data stok masuk</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl p-6 space-y-4">
            <form action="{{ route('stok-masuk.update', $stokMasuk) }}" method="POST">
                @csrf @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Barang</label>
                        <select name="barang_id" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-300">
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}" {{ $stokMasuk->barang_id == $barang->id ? 'selected' : '' }}>
                                    {{ $barang->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('barang_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Supplier</label>
                        <select name="supplier_id" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-300">
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $stokMasuk->supplier_id == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('supplier_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                        <input type="number" name="jumlah" min="1" value="{{ old('jumlah', $stokMasuk->jumlah) }}"
                               class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-300">
                        @error('jumlah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $stokMasuk->tanggal->format('Y-m-d')) }}"
                               class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-300">
                        @error('tanggal') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan <span class="text-gray-400">(opsional)</span></label>
                        <input type="text" name="keterangan" value="{{ old('keterangan', $stokMasuk->keterangan) }}"
                               class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-300">
                    </div>
                </div>

                <div class="flex gap-3 pt-4 border-t border-gray-100 mt-4">
                    <button type="submit"
                            class="text-sm font-semibold bg-amber-800 text-white px-5 py-2 rounded-xl hover:bg-amber-900 transition">
                        Perbarui
                    </button>
                    <a href="{{ route('stok-masuk.index') }}"
                       class="text-sm font-semibold border border-gray-200 text-gray-600 px-5 py-2 rounded-xl hover:bg-gray-50 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>