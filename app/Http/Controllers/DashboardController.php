<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // AdminController.php
    public function indexAdmin()
    {
        return view('admin.dashboard', [
            'totalSupplier'   => \App\Models\Supplier::count(),
            'totalGerai'      => \App\Models\Gerai::count(),
            'totalBarang'     => \App\Models\Barang::count(),
            'totalDistribusi' => \App\Models\Distribusi::count(),
        ]);
    }

    public function indexGudang()
    {
        return view('gudang.dashboard', [
            'totalSupplier'   => \App\Models\Supplier::count(),
            'totalGerai'      => \App\Models\Gerai::count(),
            'totalBarang'     => \App\Models\Barang::count(),
            'totalDistribusi' => \App\Models\Distribusi::count(),
        ]);
    }
}
