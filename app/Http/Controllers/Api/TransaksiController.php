<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('barangs')->get();
        return response()->json($transaksi);
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('barangs')->find($id);

        if (! $transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        return response()->json($transaksi);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required',
            'tanggal' => 'required',
            'jenis'   => 'required',
            'total'   => 'required',
            'barang'  => 'required|array',
            'jumlah'  => 'required|array',
        ]);

        foreach ($request->barang as $key => $barang_id) {
            $barang = Barang::find($barang_id);
            if (! $barang) {
                return response()->json(['message' => 'Barang tidak ditemukan'], 400);
            }

            if ($request->jumlah[$key] > $barang->stok) {
                return response()->json(['message' => "Jumlah barang $barang->nama melebihi stok yang tersedia"], 400);
            }
        }

        $transaksi = Transaksi::create([
            'nama'    => $request->nama,
            'tanggal' => $request->tanggal,
            'jenis'   => $request->jenis,
            'total'   => $request->total,
        ]);

        foreach ($request->barang as $key => $barang_id) {
            $barang   = Barang::find($barang_id);
            $jumlah   = $request->jumlah[$key];
            $subtotal = $jumlah * $barang->harga_jual;

            $transaksi->barangs()->attach($barang_id, [
                'jumlah'   => $jumlah,
                'subtotal' => $subtotal,
            ]);

            $barang->stok -= $jumlah;
            $barang->save();
        }

        return response()->json(['message' => 'Transaksi berhasil disimpan'], 201);
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        if (! $transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama'    => 'required',
            'tanggal' => 'required',
            'jenis'   => 'required',
            'total'   => 'required',
            'barang'  => 'required|array',
            'jumlah'  => 'required|array',
        ]);

        // Restore stok lama sebelum update
        foreach ($transaksi->barangs as $barang) {
            $barang->stok += $barang->pivot->jumlah;
            $barang->save();
        }

        $transaksi->update([
            'nama'    => $request->nama,
            'tanggal' => $request->tanggal,
            'jenis'   => $request->jenis,
            'total'   => $request->total,
        ]);

        $transaksi->barangs()->detach();

        foreach ($request->barang as $key => $barang_id) {
            $barang   = Barang::find($barang_id);
            $jumlah   = $request->jumlah[$key];
            $subtotal = $jumlah * $barang->harga_jual;

            $transaksi->barangs()->attach($barang_id, [
                'jumlah'   => $jumlah,
                'subtotal' => $subtotal,
            ]);

            $barang->stok -= $jumlah;
            $barang->save();
        }

        return response()->json(['message' => 'Transaksi berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);

        if (! $transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        // Kembalikan stok
        foreach ($transaksi->barangs as $barang) {
            $barang->stok += $barang->pivot->jumlah;
            $barang->save();
        }

        $transaksi->barangs()->detach();
        $transaksi->delete();

        return response()->json(['message' => 'Transaksi berhasil dihapus']);
    }
}
