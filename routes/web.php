<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CatatanStokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\CatatanKeuanganController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/penggajian', PenggajianController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/pembelian', PembelianController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/catatanstok', CatatanStokController::class);
Route::resource('/transaksi', TransaksiController::class);
Route::resource('/detailtransaksi', DetailTransaksiController::class);
Route::resource('/catatankeuangan', CatatanKeuanganController::class);
