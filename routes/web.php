<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CatatanStokController;
use App\Http\Controllers\TransaksiController;
// use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\CatatanKeuanganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
Route::get('/laporan/keuangan/pdf', [LaporanController::class, 'exportKeuanganPdf'])->name('laporan.keuangan.pdf');
Route::get('/laporan/catatan-stok/pdf', [LaporanController::class, 'exportCatatanStokPdf'])->name('laporan.catatanstok.pdf');
Route::get('/generate-kode-barang/{kategoriId}', [BarangController::class, 'generateKodeBarang']);
Route::get('/get-harga-beli/{pembelianId}', [BarangController::class, 'getHargaBeli']);
Route::resource('/profile', ProfileController::class);
Route::resource('/penggajian', PenggajianController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/pembelian', PembelianController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/catatanstok', CatatanStokController::class);
Route::resource('/transaksi', TransaksiController::class);
// Route::resource('/detailtransaksi', DetailTransaksiController::class);
Route::resource('/catatankeuangan', CatatanKeuanganController::class);
});
