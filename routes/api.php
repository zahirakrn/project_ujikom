<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\PembelianController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\PenggajianController;
use App\Http\Controllers\Api\CatatanStokController;
use App\Http\Controllers\Api\CatatanKeuanganController;
use App\Http\Controllers\Api\AuthController;

Route::get('/profile', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
// Route::post('/profile', [\App\Http\Controllers\Api\AuthController::class, 'profile']);
// Route::middleware('auth:sanctum')->get('/profile', [\App\Http\Controllers\Api\UserController::class, 'profile']);

Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::prefix('pembelian')->group(function () {
    Route::get('/', [PembelianController::class, 'index']);
    Route::post('/', [PembelianController::class, 'store']);
    Route::get('/{id}', [PembelianController::class, 'show']);
    Route::put('/{id}', [PembelianController::class, 'update']);
    Route::delete('/{id}', [PembelianController::class, 'destroy']);
});

Route::prefix('transaksi')->group(function () {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::post('/', [TransaksiController::class, 'store']);
    Route::get('/{id}', [TransaksiController::class, 'show']);
    Route::put('/{id}', [TransaksiController::class, 'update']);
    Route::delete('/{id}', [TransaksiController::class, 'destroy']);
});

Route::prefix('penggajian')->group(function () {
    Route::get('/', [PenggajianController::class, 'index']);
    Route::post('/', [PenggajianController::class, 'store']);
    Route::get('/{id}', [PenggajianController::class, 'show']);
    Route::put('/{id}', [PenggajianController::class, 'update']);
    Route::delete('/{id}', [PenggajianController::class, 'destroy']);
});

Route::prefix('catatanstok')->group(function () {
    Route::get('/', [CatatanstokController::class, 'index']);
    Route::post('/', [CatatanStokController::class, 'store']);
    Route::get('/{id}', [CatatanStokController::class, 'show']);
    Route::put('/{id}', [CatatanStokController::class, 'update']);
    Route::delete('/{id}', [CatatanStokController::class, 'destroy']);
});

Route::prefix('catatankeuangan')->group(function () {
    Route::get('/', [CatatanKeuanganController::class, 'index']);
    Route::post('/', [CatatanKeuanganController::class, 'store']);
    Route::get('/{id}', [CatatanKeuanganController::class, 'show']);
    Route::put('/{id}', [CatatanKeuanganController::class, 'update']);
    Route::delete('/{id}', [CatatanKeuanganController::class, 'destroy']);
});
