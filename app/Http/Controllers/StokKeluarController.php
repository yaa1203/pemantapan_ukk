<?php

namespace App\Http\Controllers;

use App\Models\StokKeluar;
use App\Models\Barang;
use App\Models\Gerai;
use Illuminate\Http\Request;

class StokKeluarController extends Controller
{
    public function index()
    {
        $data = StokKeluar::with(['barang', 'gerai', 'user'])
            ->latest()
            ->paginate(10);

        return view('gudang.stok-keluar.index', compact('data'));
    }

    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();
        $gerais  = Gerai::orderBy('nama')->get();

        return view('gudang.stok-keluar.create', compact('barangs', 'gerais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id'  => 'required|exists:barangs,id',
            'gerai_id'   => 'required|exists:gerais,id',
            'jumlah'     => 'required|integer|min:1',
            'tanggal'    => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        StokKeluar::create([
            'barang_id'  => $request->barang_id,
            'gerai_id'   => $request->gerai_id,
            'user_id'    => auth()->id(),
            'jumlah'     => $request->jumlah,
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('stok-keluar.index')
            ->with('success', 'Data stok keluar berhasil ditambahkan.');
    }

    public function edit(StokKeluar $stokKeluar)
    {
        $barangs = Barang::orderBy('nama')->get();
        $gerais  = Gerai::orderBy('nama')->get();

        return view('gudang.stok-keluar.edit', compact('stokKeluar', 'barangs', 'gerais'));
    }

    public function update(Request $request, StokKeluar $stokKeluar)
    {
        $request->validate([
            'barang_id'  => 'required|exists:barangs,id',
            'gerai_id'   => 'required|exists:gerais,id',
            'jumlah'     => 'required|integer|min:1',
            'tanggal'    => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $stokKeluar->update($request->only(
            'barang_id', 'gerai_id', 'jumlah', 'tanggal', 'keterangan'
        ));

        return redirect()->route('stok-keluar.index')
            ->with('success', 'Data stok keluar berhasil diperbarui.');
    }

    public function destroy(StokKeluar $stokKeluar)
    {
        $stokKeluar->delete();

        return redirect()->route('stok-keluar.index')
            ->with('success', 'Data stok keluar berhasil dihapus.');
    }
}