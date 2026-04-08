<?php

namespace App\Http\Controllers;

use App\Models\StokMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StokMasukController extends Controller
{
    public function index()
    {
        $data = StokMasuk::with(['barang', 'supplier', 'user'])
            ->latest()
            ->paginate(10);

        return view('gudang.stok-masuk.index', compact('data'));
    }

    public function create()
    {
        $barangs   = Barang::orderBy('nama_barang')->get();
        $suppliers = Supplier::orderBy('nama')->get();

        return view('gudang.stok-masuk.create', compact('barangs', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id'   => 'required|exists:barangs,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah'      => 'required|integer|min:1',
            'tanggal'     => 'required|date',
            'keterangan'  => 'nullable|string|max:255',
        ]);

        StokMasuk::create([
            'barang_id'   => $request->barang_id,
            'supplier_id' => $request->supplier_id,
            'user_id'     => auth()->id(),
            'jumlah'      => $request->jumlah,
            'tanggal'     => $request->tanggal,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->route('stok-masuk.index')
            ->with('success', 'Data stok masuk berhasil ditambahkan.');
    }

    public function edit(StokMasuk $stokMasuk)
    {
        $barangs   = Barang::orderBy('nama')->get();
        $suppliers = Supplier::orderBy('nama')->get();

        return view('gudang.stok-masuk.edit', compact('stokMasuk', 'barangs', 'suppliers'));
    }

    public function update(Request $request, StokMasuk $stokMasuk)
    {
        $request->validate([
            'barang_id'   => 'required|exists:barangs,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah'      => 'required|integer|min:1',
            'tanggal'     => 'required|date',
            'keterangan'  => 'nullable|string|max:255',
        ]);

        $stokMasuk->update($request->only(
            'barang_id', 'supplier_id', 'jumlah', 'tanggal', 'keterangan'
        ));

        return redirect()->route('stok-masuk.index')
            ->with('success', 'Data stok masuk berhasil diperbarui.');
    }

    public function destroy(StokMasuk $stokMasuk)
    {
        $stokMasuk->delete();

        return redirect()->route('stok-masuk.index')
            ->with('success', 'Data stok masuk berhasil dihapus.');
    }
}