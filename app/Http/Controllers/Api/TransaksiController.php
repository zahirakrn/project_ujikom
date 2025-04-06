<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('barangs')->get();
        return response()->json($transaksi);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'total' => 'required',
            'barang' => 'required|array',
            'jumlah' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $transaksi = Transaksi::create([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenis,
                'total' => $request->total,
            ]);

            foreach ($request->barang as $key => $barang_id) {
                $barang = Barang::findOrFail($barang_id);

                if ($request->jumlah[$key] > $barang->stok) {
                    return response()->json(['error' => "Jumlah barang $barang->nama melebihi stok yang tersedia"], 400);
                }

                $transaksi->barangs()->attach($barang_id, [
                    'jumlah' => $request->jumlah[$key],
                    'subtotal' => $request->jumlah[$key] * $barang->harga_jual,
                ]);

                $barang->stok -= $request->jumlah[$key];
                $barang->save();
            }

            DB::commit();
            return response()->json(['message' => 'Transaksi berhasil disimpan'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('barangs')->findOrFail($id);
        return response()->json($transaksi);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'total' => 'required',
            'barang' => 'required|array',
            'jumlah' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->update($request->only(['nama', 'tanggal', 'jenis', 'total']));

            $transaksi->barangs()->detach();

            foreach ($request->barang as $key => $barang_id) {
                $barang = Barang::findOrFail($barang_id);
                $transaksi->barangs()->attach($barang_id, [
                    'jumlah' => $request->jumlah[$key],
                    'subtotal' => $request->jumlah[$key] * $barang->harga_jual,
                ]);
            }

            DB::commit();
            return response()->json(['message' => 'Transaksi berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->barangs()->detach();
        $transaksi->delete();
        return response()->json(['message' => 'Transaksi berhasil dihapus'], 200);
    }
}
