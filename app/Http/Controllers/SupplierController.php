<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $data = Supplier::all();
        return view('supplier.index', compact('data'));
    }

    public function create()
    {
        if(auth()->user()->role != 'admin'){
            abort(403);
        }
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->role != 'admin'){
            abort(403);
        }

        Supplier::create($request->all());
        return redirect('/supplier');
    }

    public function edit($id)
    {
        if(auth()->user()->role != 'admin'){
            abort(403);
        }

        $data = Supplier::findOrFail($id);
        return view('supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->role != 'admin'){
            abort(403);
        }

        Supplier::findOrFail($id)->update($request->all());
        return redirect('/supplier');
    }

    public function destroy($id)
    {
        if(auth()->user()->role != 'admin'){
            abort(403);
        }

        Supplier::findOrFail($id)->delete();
        return redirect('/supplier');
    }
}