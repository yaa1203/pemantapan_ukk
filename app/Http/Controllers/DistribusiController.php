<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Barang;
use App\Models\Gerai;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    public function index()
    {
        $data = Distribusi::with(['barang', 'gerai'])->get();
        return view('distribusi.index', compact('data'));
    }

    public function create()
    {
        $barang = Barang::all();
        $gerai = Gerai::all();
        return view('distribusi.create', compact('barang', 'gerai'));
    }

    public function store(Request $request)
    {
        $barang = Barang::findOrFail($request->barang_id);

        // ❗ VALIDASI JUMLAH
        if ($request->jumlah > $barang->stok) {
            return back()->with('error', 'Jumlah melebihi stok!');
        }

        // ✅ ambil harga dari barang (bukan dari input)
        $harga = $barang->harga;

        // simpan distribusi
        Distribusi::create([
            'barang_id' => $request->barang_id,
            'gerai_id' => $request->gerai_id,
            'jumlah' => $request->jumlah,
            'harga' => $harga,
            'tanggal' => $request->tanggal,
        ]);

        // 🔥 kurangi stok
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect('/distribusi')->with('success', 'Distribusi berhasil');
    }

    public function destroy($id)
    {
        Distribusi::findOrFail($id)->delete();
        return redirect('/distribusi');
    }
}