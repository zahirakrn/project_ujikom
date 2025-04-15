<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatatanStok;
use App\Models\Barang;
use Illuminate\Http\Request;

class CatatanStokController extends Controller
{
    // Menampilkan semua catatan stok
    public function index()
    {
        $catatanStoks = CatatanStok::with('barang')->get(); // Mengambil data catatan stok beserta data barang
        return response()->json($catatanStoks);
    }

    // Menampilkan catatan stok berdasarkan ID
    public function show($id)
    {
        $catatanStok = CatatanStok::with('barang')->find($id);

        if (!$catatanStok) {
            return response()->json(['message' => 'Catatan stok tidak ditemukan'], 404);
        }

        return response()->json($catatanStok);
    }

    // Menambahkan catatan stok baru
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id', // Pastikan id_barang ada dalam tabel barangs
            'jenis' => 'required|string',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $catatanStok = CatatanStok::create([
            'id_barang' => $request->id_barang,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan ?? '',
        ]);

        return response()->json($catatanStok, 201); // Mengembalikan data catatan stok yang baru ditambahkan
    }

    // Mengupdate catatan stok
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'jenis' => 'required|string',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $catatanStok = CatatanStok::find($id);

        if (!$catatanStok) {
            return response()->json(['message' => 'Catatan stok tidak ditemukan'], 404);
        }

        $catatanStok->update([
            'id_barang' => $request->id_barang,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan ?? '',
        ]);

        return response()->json($catatanStok);
    }

    // Menghapus catatan stok
    public function destroy($id)
    {
        $catatanStok = CatatanStok::find($id);

        if (!$catatanStok) {
            return response()->json(['message' => 'Catatan stok tidak ditemukan'], 404);
        }

        $catatanStok->delete();
        return response()->json(['message' => 'Catatan stok berhasil dihapus']);
    }
}
