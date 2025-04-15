<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class CatatanKeuanganController extends Controller
{
    // GET: /api/catatan-keuangan
    public function index(Request $request)
    {
        $query = CatatanKeuangan::query();

        // Filter tanggal jika dikirim
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        return response()->json($query->orderBy('tanggal', 'desc')->get());
    }

    // POST: /api/catatan-keuangan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis'      => 'required|string',
            'jumlah'     => 'required|integer',
            'tanggal'    => 'required|date',
            'keterangan' => 'required|string',
        ]);

        $catatan = CatatanKeuangan::create($validated);

        return response()->json([
            'message' => 'Catatan keuangan berhasil ditambahkan',
            'data'    => $catatan,
        ], 201);
    }

    // GET: /api/catatan-keuangan/{id}
    public function show($id)
    {
        $catatan = CatatanKeuangan::find($id);

        if (! $catatan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($catatan);
    }

    // PUT: /api/catatan-keuangan/{id}
    public function update(Request $request, $id)
    {
        $catatan = CatatanKeuangan::find($id);

        if (! $catatan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'jenis'      => 'required|string',
            'jumlah'     => 'required|integer',
            'tanggal'    => 'required|date',
            'keterangan' => 'required|string',
        ]);

        $catatan->update($validated);

        return response()->json([
            'message' => 'Catatan keuangan berhasil diperbarui',
            'data'    => $catatan,
        ]);
    }

    // DELETE: /api/catatan-keuangan/{id}
    public function destroy($id)
    {
        $catatan = CatatanKeuangan::find($id);

        if (! $catatan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $catatan->delete();

        return response()->json(['message' => 'Catatan keuangan berhasil dihapus']);
    }
}
