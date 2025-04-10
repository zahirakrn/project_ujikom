<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('barangs.pembelian')->get();
        return response()->json(['data' => $transaksi]);
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('barangs.pembelian')->findOrFail($id);
        return response()->json(['data' => $transaksi]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'tanggal' => 'required',
            'jenis'   => 'required',
            'total'   => 'required',
            'barang'  => 'required|array',
            'jumlah'  => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $transaksi = Transaksi::create([
                'nama'    => $request->nama,
                'tanggal' => $request->tanggal,
                'jenis'   => $request->jenis,
                'total'   => $request->total,
            ]);

            foreach ($request->barang as $key => $barang_id) {
                $barang = Barang::findOrFail($barang_id);

                if ($request->jumlah[$key] > $barang->stok) {
                    return response()->json([
                        'error' => "Jumlah barang $barang->kode_barang melebihi stok",
                    ], 400);
                }

                $transaksi->barangs()->attach($barang_id, [
                    'jumlah'   => $request->jumlah[$key],
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required',
            'tanggal' => 'required',
            'jenis'   => 'required',
            'total'   => 'required',
            'barang'  => 'required|array',
            'jumlah'  => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $transaksi = Transaksi::with('barangs')->findOrFail($id);

            // Kembalikan stok barang sebelumnya
            foreach ($transaksi->barangs as $barang) {
                $barang->stok += $barang->pivot->jumlah;
                $barang->save();
            }

            // Hapus relasi lama
            $transaksi->barangs()->detach();

            // Update data transaksi
            $transaksi->update($request->only(['nama', 'tanggal', 'jenis', 'total']));

           
            foreach ($request->barang as $key => $barang_id) {
                $barang = Barang::findOrFail($barang_id);

                if ($request->jumlah[$key] > $barang->stok) {
                    return response()->json([
                        'error' => "Jumlah barang $barang->kode_barang melebihi stok",
                    ], 400);
                }

                $transaksi->barangs()->attach($barang_id, [
                    'jumlah'   => $request->jumlah[$key],
                    'subtotal' => $request->jumlah[$key] * $barang->harga_jual,
                ]);

                $barang->stok -= $request->jumlah[$key];
                $barang->save();
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


        foreach ($transaksi->barangs as $barang) {
            $barang->stok += $barang->pivot->jumlah;
            $barang->save();
        }

        $transaksi->barangs()->detach();
        $transaksi->delete();

        return response()->json(['message' => 'Transaksi berhasil dihapus'], 200);
    }
}
