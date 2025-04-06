<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'pembelian_transaksi', 'barang_transaksi', 'nama', 'tanggal', 'jumlah', 'jenis'];
    public $timestamp = true;

    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'barang_transaksi')->withPivot('jumlah', 'subtotal')->withTimestamps();
    }

    public function pembelians()
    {
        return $this->belongsToMany(Pembelian::class, 'pembelian_transaksi')->withTimestamps();
    }
}
