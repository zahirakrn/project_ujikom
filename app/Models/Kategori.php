<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['id','nama'];
    public $timestamp = true;
    
    public function barang()
{
    return $this->hasMany(Barang::class, 'id_kategori');
}

}
