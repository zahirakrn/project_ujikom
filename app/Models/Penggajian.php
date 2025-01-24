<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pegawai','jumlah_gaji','tanggal_gaji','status','kontak',];
    public $timestamp = true;
}