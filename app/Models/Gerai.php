<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'telepon'
    ];

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
}