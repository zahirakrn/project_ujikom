<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penggajian;

class PenggajianController extends Controller
{
    // Tampilkan semua data penggajian
    public function index()
    {
        $penggajians = Penggajian::all();
        return response()->json($penggajians);
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jumlah_gaji' => 'required|integer',
            'tanggal_gaji' => 'required|date',
            'status' => 'required|string',
            'kontak' => 'required|string',
        ]);

        $penggajian = Penggajian::create($request->all());

        return response()->json([
            'message' => 'Data penggajian berhasil ditambahkan.',
            'data' => $penggajian
        ], 201);
    }

    // Tampilkan detail berdasarkan ID
    public function show($id)
    {
        $penggajian = Penggajian::find($id);

        if (!$penggajian) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        return response()->json($penggajian);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $penggajian = Penggajian::find($id);

        if (!$penggajian) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $penggajian->update($request->all());

        return response()->json([
            'message' => 'Data penggajian berhasil diupdate.',
            'data' => $penggajian
        ]);
    }

    // Hapus data
    public function destroy($id)
    {
        $penggajian = Penggajian::find($id);

        if (!$penggajian) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $penggajian->delete();

        return response()->json(['message' => 'Data penggajian berhasil dihapus.']);
    }
}
