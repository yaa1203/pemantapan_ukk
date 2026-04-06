<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::with('supplier')->get();
        return view('barang.index', compact('data'));
    }

    public function create()
    {
        $supplier = Supplier::all();
        return view('barang.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        Barang::create($request->all());
        return redirect('/barang');
    }

    public function edit($id)
    {
        $data = Barang::findOrFail($id);
        $supplier = Supplier::all();
        return view('barang.edit', compact('data', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        Barang::findOrFail($id)->update($request->all());
        return redirect('/barang');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect('/barang');
    }
}