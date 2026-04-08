<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class LaporanGudangController extends Controller
{
    public function index(Request $request)
    {
        $dari   = $request->dari ?? now()->startOfMonth()->format('Y-m-d');
        $sampai = $request->sampai ?? now()->format('Y-m-d');

        // Rekap per barang
        $rekap = Barang::withSum(
                ['stokMasuks as total_masuk' => fn($q) => $q->whereBetween('tanggal', [$dari, $sampai])],
                'jumlah'
            )
            ->withSum(
                ['stokKeluars as total_keluar' => fn($q) => $q->whereBetween('tanggal', [$dari, $sampai])],
                'jumlah'
            )
            ->get()
            ->map(function ($b) {
                $b->total_masuk  = $b->total_masuk  ?? 0;
                $b->total_keluar = $b->total_keluar ?? 0;
                $b->selisih      = $b->total_masuk - $b->total_keluar;
                return $b;
            });

        // Riwayat transaksi
        $riwayatMasuk = StokMasuk::with(['barang', 'supplier', 'user'])
            ->whereBetween('tanggal', [$dari, $sampai])
            ->latest('tanggal')
            ->get()
            ->map(fn($r) => [
                'tanggal' => $r->tanggal,
                'jenis'   => 'Masuk',
                'barang'  => $r->barang->nama ?? '-',
                'pihak'   => $r->supplier->nama ?? '-',
                'jumlah'  => $r->jumlah,
                'user'    => $r->user->name ?? '-',
                'ket'     => $r->keterangan,
            ]);

        $riwayatKeluar = StokKeluar::with(['barang', 'gerai', 'user'])
            ->whereBetween('tanggal', [$dari, $sampai])
            ->latest('tanggal')
            ->get()
            ->map(fn($r) => [
                'tanggal' => $r->tanggal,
                'jenis'   => 'Keluar',
                'barang'  => $r->barang->nama ?? '-',
                'pihak'   => $r->gerai->nama ?? '-',
                'jumlah'  => $r->jumlah,
                'user'    => $r->user->name ?? '-',
                'ket'     => $r->keterangan,
            ]);

        $riwayat = $riwayatMasuk->merge($riwayatKeluar)
            ->sortByDesc('tanggal')
            ->values();

        return view('gudang.laporan.index', compact('rekap', 'riwayat', 'dari', 'sampai'));
    }
}