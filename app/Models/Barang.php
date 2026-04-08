<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kategori',
        'nama_barang',
        'harga',
        'stok',
        'supplier_id'
    ];

    // 🔗 ke supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // 🔗 ke distribusi
    public function distribusis()
    {
        return $this->hasMany(Distribusi::class);
    }

    // 🔗 ke transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function stokMasuks()
    {
        return $this->hasMany(StokMasuk::class);
    }

    public function stokKeluars()
    {
        return $this->hasMany(StokKeluar::class);
    }
}