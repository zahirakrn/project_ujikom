<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BarangController extends Controller
{
    public function generateKodeBarang($kategoriId): JsonResponse
    {
        $kategori = Kategori::findOrFail($kategoriId);
        $count = Barang::where('id_kategori', $kategoriId)->count() + 1;
        $kodeBarang = strtoupper(substr($kategori->nama, 0, 3)) . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

        return response()->json(['kode_barang' => $kodeBarang]);
    }

    public function getHargaBeli($pembelianId): JsonResponse
    {
        $pembelian = Pembelian::findOrFail($pembelianId);
        return response()->json(['harga_beli' => $pembelian->harga_beli]);
    }

    public function index(): JsonResponse
    {
        $barang = Barang::with(['pembelian', 'kategori'])->get();
        return response()->json($barang);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'id_kategori' => 'required',
            'id_pembelian' => 'required',
            'kode_barang' => 'required|string',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer|min:1',
            'unit' => 'required|string',
        ]);

        $barang = Barang::where('kode_barang', trim($request->kode_barang))
            ->where('id_kategori', $request->id_kategori)
            ->first();

        if ($barang) {
            $barang->increment('stok', $request->stok);
            return response()->json(['message' => 'Stok Barang Berhasil Ditambahkan', 'barang' => $barang]);
        }

        $newBarang = Barang::create($request->all());
        return response()->json(['message' => 'Data Barang Berhasil Ditambahkan', 'barang' => $newBarang], 201);
    }

    public function show($id): JsonResponse
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'id_kategori' => 'required',
            'id_pembelian' => 'required',
            'kode_barang' => 'required|string',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer|min:1',
            'unit' => 'required|string',
        ]);

        $barang = Barang::findOrFail($id);

        $existingBarang = Barang::where('kode_barang', trim($request->kode_barang))
            ->where('id_kategori', $request->id_kategori)
            ->where('id', '!=', $id)
            ->first();

        if ($existingBarang) {
            $existingBarang->increment('stok', $request->stok);
            $barang->delete();
            return response()->json(['message' => 'Stok Barang Digabungkan', 'barang' => $existingBarang]);
        }

        $barang->update($request->all());
        return response()->json(['message' => 'Data Berhasil Diubah', 'barang' => $barang]);
    }

    public function destroy($id): JsonResponse
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
