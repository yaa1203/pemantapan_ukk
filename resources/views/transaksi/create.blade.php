<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-10 px-4">
        <div class="w-full max-w-xl">

            {{-- HEADER --}}
            <div class="mb-8">
                <p class="text-xs font-semibold tracking-widest text-indigo-500 uppercase mb-1">Manajemen Penjualan</p>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Tambah Transaksi</h1>
                <p class="text-sm text-gray-400 mt-1">Isi form di bawah untuk mencatat transaksi baru</p>
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
                <form method="POST" action="{{ route('transaksi.store') }}">
                    @csrf

                    {{-- PILIH BARANG --}}
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Barang</label>
                        <div class="relative">
                            <select name="barang_id" id="barang"
                                class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-3 pr-10 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition" required>
                                <option value="">— Pilih Barang —</option>
                                @foreach($barang as $b)
                                    <option value="{{ $b->id }}"
                                        data-harga="{{ $b->harga }}"
                                        data-stok="{{ $b->stok }}">
                                        {{ $b->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- GERAI (manual select) --}}
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Gerai</label>
                        <div class="relative">
                            <select name="gerai_id" id="gerai_select"
                                class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-3 pr-10 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition" required>
                                <option value="">— Pilih Gerai —</option>
                                @foreach($gerai as $g)
                                    <option value="{{ $g->id }}">{{ $g->nama }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- INFO ROW: Harga & Stok --}}
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Harga Satuan</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-xs text-gray-400 font-medium">Rp</span>
                                <input type="text" id="harga"
                                    class="w-full border border-gray-200 rounded-xl pl-9 pr-4 py-3 text-sm bg-gray-100 text-gray-700 cursor-not-allowed"
                                    readonly placeholder="0">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Stok Tersedia</label>
                            <input type="text" id="stok"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm bg-gray-100 text-gray-700 cursor-not-allowed"
                                readonly placeholder="0">
                        </div>
                    </div>

                    {{-- JUMLAH --}}
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" min="1"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-800 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                            placeholder="Masukkan jumlah..." required>
                        <p id="stok_warning" class="text-xs text-red-500 mt-1 hidden">⚠ Jumlah melebihi stok yang tersedia</p>
                    </div>

                    {{-- TOTAL --}}
                    <div class="mb-8">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Total Harga</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-xs text-gray-400 font-medium">Rp</span>
                            <input type="text" id="total"
                                class="w-full border border-indigo-100 rounded-xl pl-9 pr-4 py-3 text-sm font-bold text-indigo-700 bg-indigo-50 cursor-not-allowed"
                                readonly placeholder="0">
                        </div>
                    </div>

                    {{-- SUBMIT --}}
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white font-semibold py-3 rounded-xl transition-all duration-150 text-sm tracking-wide shadow-md shadow-indigo-200">
                        Simpan Transaksi
                    </button>
                </form>
            </div>

            <p class="text-center text-xs text-gray-400 mt-6">Data tersimpan otomatis ke sistem inventaris</p>
        </div>
    </div>
</x-app-layout>

<script>
    const barangEl    = document.getElementById('barang');
    const hargaEl     = document.getElementById('harga');
    const stokEl      = document.getElementById('stok');
    const jumlahEl    = document.getElementById('jumlah');
    const totalEl     = document.getElementById('total');
    const stokWarning = document.getElementById('stok_warning');

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    // Saat pilih barang → isi harga & stok
    barangEl.addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const harga    = selected.getAttribute('data-harga') || 0;
        const stok     = selected.getAttribute('data-stok')  || 0;

        hargaEl.value  = formatRupiah(harga);
        stokEl.value   = stok;
        totalEl.value  = '';
        jumlahEl.value = '';
        stokWarning.classList.add('hidden');
    });

    // Hitung total + validasi stok
    jumlahEl.addEventListener('input', function () {
        const hargaRaw = parseInt(barangEl.options[barangEl.selectedIndex]?.getAttribute('data-harga') || 0);
        const stokMax  = parseInt(stokEl.value || 0);
        const jumlah   = parseInt(this.value || 0);

        if (jumlah > stokMax && stokMax > 0) {
            stokWarning.classList.remove('hidden');
        } else {
            stokWarning.classList.add('hidden');
        }

        totalEl.value = jumlah > 0 ? formatRupiah(hargaRaw * jumlah) : '';
    });
</script>