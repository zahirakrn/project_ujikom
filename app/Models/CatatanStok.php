<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatatanStok extends Model
{
    protected $fillable = ['id','id_barang','jenis', 'jumlah', 'tanggal', 'keterangan' ];
    public $timestamp = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
