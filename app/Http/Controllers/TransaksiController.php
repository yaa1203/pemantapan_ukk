<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Gerai;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with(['barang', 'gerai'])->get();
        return view('transaksi.index', compact('data'));
    }

    public function create()
    {
        $barang = Barang::all();
        $gerai = Gerai::all();
        $data = Transaksi::all();
        return view('transaksi.create', compact('barang', 'gerai', 'data'));
    }

    public function store(Request $request)
    {
        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jumlah > $barang->stok) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        $total = $barang->harga * $request->jumlah;

        Transaksi::create([
            'barang_id' => $request->barang_id,
            'gerai_id' => $request->gerai_id, // ✅ dari form
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
            'tanggal' => now()
        ]);

        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect('/transaksi')->with('success', 'Berhasil');
    }

    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect('/transaksi');
    }
}