<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['id_kategori', 'id_pembelian', 'kode_barang', 'nama_barang', 'harga_beli', 'harga_jual', 'stok', 'unit'];
    public $timestamps = true;

    /**
     * Relasi Many-to-Many dengan Transaksi
     */
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'barang_transaksi')->withPivot('jumlah', 'subtotal')->withTimestamps();
    }

    // Relasi dengan kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'id_pembelian');
    }

    
    public function catatanStok()
    {
        return $this->hasMany(CatatanStok::class, 'id_barang');
    }
}
