<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use Illuminate\Http\Request;

class GeraiController extends Controller
{
    public function index()
    {
        $data = Gerai::all();
        return view('gerai.index', compact('data'));
    }

    public function create()
    {
        return view('gerai.create');
    }

    public function store(Request $request)
    {
        Gerai::create($request->all());
        return redirect('/gerai');
    }

    public function edit($id)
    {
        $data = Gerai::findOrFail($id);
        return view('gerai.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Gerai::findOrFail($id)->update($request->all());
        return redirect('/gerai');
    }

    public function destroy($id)
    {
        Gerai::findOrFail($id)->delete();
        return redirect('/gerai');
    }
}