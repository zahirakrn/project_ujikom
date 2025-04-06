<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use Illuminate\Support\Facades\Validator;

class PembelianController extends Controller
{
    // Ambil semua data pembelian
    public function index()
    {
        $pembelian = Pembelian::all();
        return response()->json([
            'success' => true,
            'message' => 'List Pembelian',
            'data' => $pembelian
        ], 200);
    }

    // Simpan data pembelian baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'tanggal' => 'required|date',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }

        $pembelian = Pembelian::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pembelian berhasil ditambahkan',
            'data' => $pembelian
        ], 201);
    }

    // Ambil data pembelian berdasarkan ID
    public function show($id)
    {
        $pembelian = Pembelian::find($id);

        if (!$pembelian) {
            return response()->json([
                'success' => false,
                'message' => 'Pembelian tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Pembelian',
            'data' => $pembelian
        ], 200);
    }

    // Update data pembelian
    public function update(Request $request, $id)
    {
        $pembelian = Pembelian::find($id);

        if (!$pembelian) {
            return response()->json([
                'success' => false,
                'message' => 'Pembelian tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'tanggal' => 'required|date',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }

        $pembelian->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pembelian berhasil diperbarui',
            'data' => $pembelian
        ], 200);
    }

    // Hapus data pembelian
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);

        if (!$pembelian) {
            return response()->json([
                'success' => false,
                'message' => 'Pembelian tidak ditemukan'
            ], 404);
        }

        $pembelian->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pembelian berhasil dihapus'
        ], 200);
    }
}
