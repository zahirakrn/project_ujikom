<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanKeuangan extends Model
{
    use HasFactory;

    protected $fillable = ['id','jenis','jumlah','keterangan','tanggal',];
    public $timestamp = true;
}
