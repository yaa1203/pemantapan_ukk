<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-10 px-4">
        <div class="w-full max-w-xl">

            {{-- HEADER --}}
            <div class="mb-8">
                <p class="text-xs font-semibold tracking-widest text-indigo-500 uppercase mb-1">Manajemen Inventaris</p>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Edit Barang</h1>
                <p class="text-sm text-gray-400 mt-1">Perbarui informasi barang <span class="text-gray-600 font-medium">{{ $data->nama_barang }}</span></p>
            </div>

            {{-- ERROR --}}
            @if(session('error'))
                <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                    <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-5.25a.75.75 0 001.5 0v-4a.75.75 0 00-1.5 0v4zm.75-7a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            {{-- FORM CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <form method="POST" action="/barang/{{ $data->id }}">
                    @csrf
                    @method('PUT')

                    {{-- NAMA BARANG --}}
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang', $data->nama_barang) }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                            placeholder="Contoh: Kursi Kantor" required>
                        @error('nama_barang')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- KATEGORI --}}
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori', $data->kategori) }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                            placeholder="Contoh: Furnitur" required>
                        @error('kategori')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- HARGA & STOK --}}
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Harga</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-xs text-gray-400 font-medium">Rp</span>
                                <input type="number" name="harga" value="{{ old('harga', $data->harga) }}"
                                    class="w-full border border-gray-200 rounded-xl pl-9 pr-4 py-3 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                                    placeholder="0" required>
                            </div>
                            @error('harga')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Stok</label>
                            <input type="number" name="stok" value="{{ old('stok', $data->stok) }}"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                                placeholder="0" required>
                            @error('stok')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- SUPPLIER --}}
                    <div class="mb-8">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Supplier</label>
                        <div class="relative">
                            <select name="supplier_id"
                                class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-3 pr-10 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition" required>
                                <option value="">— Pilih Supplier —</option>
                                @foreach($supplier as $s)
                                    <option value="{{ $s->id }}" {{ old('supplier_id', $data->supplier_id) == $s->id ? 'selected' : '' }}>
                                        {{ $s->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                        @error('supplier_id')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ACTIONS --}}
                    <div class="flex items-center gap-3">
                        <button type="submit"
                            class="flex-1 bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white font-semibold py-3 rounded-xl transition-all duration-150 text-sm tracking-wide shadow-md shadow-indigo-200">
                            Update Barang
                        </button>
                        <a href="/barang"
                            class="flex-none px-5 py-3 rounded-xl border border-gray-200 text-sm font-semibold text-gray-500 hover:bg-gray-50 transition-colors">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

            <p class="text-center text-xs text-gray-400 mt-6">Perubahan tersimpan otomatis ke sistem inventaris</p>
        </div>
    </div>
</x-app-layout>