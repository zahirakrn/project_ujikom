<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();  // Mengambil semua data transaksi
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'total' => 'required',
        ]);

        // Simpan data transaksi baru
        $transaksi = new Transaksi();
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->total = $request->total;
        $transaksi->save();

        // Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('transaksi.index');
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
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'total' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->total = $request->total;
        $transaksi->save();

        // Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        // Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('transaksi.index');
    }
}
