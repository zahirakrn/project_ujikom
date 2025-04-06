<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_perusahaan', 'nama', 'jumlah', 'harga_beli', 'tanggal', 'alamat'];
    public $timestamp = true;
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'pembelian_transaksi')->withTimestamps();
    }
}
