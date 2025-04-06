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

        // Simpan transaksi utama
        $transaksi = new Transaksi();
        $transaksi->nama = $request->nama;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->total = $request->total;
        $transaksi->save();

        // Simpan detail transaksi
        foreach ($request->barang as $key => $barang_id) {
            $barang = Barang::find($barang_id);

            // Simpan detail transaksi ke dalam tabel detail_transaksis
            DB::table('barang_transaksi')->insert([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barang->id,
                'jumlah' => $request->jumlah[$key],
                'subtotal' => $request->jumlah[$key] * $barang->harga_jual,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Kurangi stok barang
            $barang->stok -= $request->jumlah[$key];
            $barang->save();
        }

        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoClose(1000);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil transaksi berdasarkan ID dan relasi barangs
        $transaksi = Transaksi::with('barangs')->findOrFail($id);

        // Kirim data transaksi beserta barang yang terkait
        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::with('barangs')->findOrFail($id);
        $barang = Barang::all(); // Ambil semua barang
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

        // Hapus detail transaksi lama
        $transaksi->barangs()->detach();

        // Simpan transaksi baru
        foreach ($request->barang as $key => $barang_id) {
            $barang = Barang::find($barang_id);
            $transaksi->barangs()->attach($barang_id, [
                'jumlah' => $request->jumlah[$key],
                'subtotal' => $request->jumlah[$key] * $barang->harga_jual,
            ]);
        }

        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Hapus detail transaksi di tabel barang_transaksi
        $transaksi->barangs()->detach();

        // Hapus transaksi utama
        $transaksi->delete();

        Alert::success('Success', 'Data Berhasil Dihapus')->autoClose(1000);
        return redirect()->route('transaksi.index');
    }
}
