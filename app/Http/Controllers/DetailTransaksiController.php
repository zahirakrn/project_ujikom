<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailTransaksi = DetailTransaksi::all();  // Mengambil semua data detail transaksi
        return view('admin.detailTransaksi.index', compact('detailTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transaksi = Transaksi::all();  // Menampilkan semua transaksi
        $barang = Barang::all();  // Menampilkan semua barang
        return view('admin.detailTransaksi.create', compact('transaksi', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'subtotal' => 'required',
        ]);

        // Simpan data detail transaksi baru
        $detailTransaksi = new DetailTransaksi();
        $detailTransaksi->id_transaksi = $request->id_transaksi;
        $detailTransaksi->id_barang = $request->id_barang;
        $detailTransaksi->jumlah = $request->jumlah;
        $detailTransaksi->harga = $request->harga;
        $detailTransaksi->subtotal = $request->subtotal;
        $detailTransaksi->save();

        // Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('detailtransaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detailTransaksi = DetailTransaksi::findOrFail($id);
        $transaksi = Transaksi::all();  // Menampilkan semua transaksi
        $barang = Barang::all();  // Menampilkan semua barang

        return view('admin.detailTransaksi.edit', compact('detailTransaksi', 'transaksi', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'subtotal' => 'required',
        ]);

        $detailTransaksi = DetailTransaksi::findOrFail($id);
        $detailTransaksi->id_transaksi = $request->id_transaksi;
        $detailTransaksi->id_barang = $request->id_barang;
        $detailTransaksi->jumlah = $request->jumlah;
        $detailTransaksi->harga = $request->harga;
        $detailTransaksi->subtotal = $request->subtotal;
        $detailTransaksi->save();

        // Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('detailtransaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detailTransaksi = DetailTransaksi::findOrFail($id);
        $detailTransaksi->delete();

        // Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('detailtransaksi.index');
    }
}
