<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    protected $fillable = [
        'barang_id',
        'gerai_id',
        'jumlah',
        'harga',
        'tanggal'
    ];

    // 🔗 ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // 🔗 ke gerai
    public function gerai()
    {
        return $this->belongsTo(Gerai::class);
    }
}