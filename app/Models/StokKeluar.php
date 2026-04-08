<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokKeluar extends Model
{
    protected $fillable = ['barang_id', 'gerai_id', 'user_id', 'jumlah', 'keterangan', 'tanggal'];

    protected $casts = ['tanggal' => 'date'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function gerai()
    {
        return $this->belongsTo(Gerai::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}