<?php

namespace App\Http\Controllers;

use Alert;
use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\DetailTransaksi;
use DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all(); // Mengambil semua data transaksi
        $barang = Barang::all();

        return view('admin.transaksi.index', compact('transaksi', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        // dd($barang);
        return view('admin.transaksi.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        foreach ($request->barang as $key => $barang_id) {
            $barang = Barang::find($barang_id);
            if (!$barang) {
                return back()->withErrors(['barang' => 'Barang tidak ditemukan']);
            }

            if ($request->jumlah[$key] > $barang->stok) {
                return back()->withErrors(['jumlah' => "Jumlah barang $barang->nama melebihi stok yang tersedia"]);
            }
        }

        $transaksi = new Transaksi();
        $transaksi->nama = $request->nama;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->total = $request->total;
        $transaksi->save();

        foreach ($request->barang as $key => $barang_id) {
            $barang = Barang::find($barang_id);

            DB::table('barang_transaksi')->insert([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barang->id,
                'jumlah' => $request->jumlah[$key],
                'subtotal' => $request->jumlah[$key] * $barang->harga_jual,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $barang->stok -= $request->jumlah[$key];
            $barang->save();
        }
        Alert::toast('Data Berhasil Ditambahkan', 'success')->position('top-end')->autoClose(3000);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('barangs')->findOrFail($id);

        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::with('barangs')->findOrFail($id);
        $barang = Barang::all();
        return view('admin.transaksi.edit', compact('transaksi', 'barang'));
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

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->nama = $request->nama;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->total = $request->total;
        $transaksi->save();

        $transaksi->barangs()->detach();

        foreach ($request->barang as $key => $barang_id) {
            $barang = Barang::find($barang_id);
            $transaksi->barangs()->attach($barang_id, [
                'jumlah' => $request->jumlah[$key],
                'subtotal' => $request->jumlah[$key] * $barang->harga_jual,
            ]);
        }

        Alert::toast('Data Berhasil Diubah', 'success')->position('top-end')->autoClose(3000)->background('#3498db');
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->barangs()->detach();
        $transaksi->delete();

        Alert::toast('Data Berhasil Dihapus', 'success')->position('top-end')->autoClose(3000)->background('#e74c3c');
        return redirect()->route('transaksi.index');
    }
}
