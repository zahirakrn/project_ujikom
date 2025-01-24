<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::all();  // Mengambil semua data kategori
        return view('admin.pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
        ]);


        $pembelian = new Pembelian();
        $pembelian->nama_perusahaan = $request->nama_perusahaan;
        $pembelian->nama= $request->nama;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->alamat= $request->alamat;
        $pembelian->save();

        // Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('pembelian.index');
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
        $pembelian = Pembelian::findOrFail($id);
        return view('admin.pembelian.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->nama_perusahaan = $request->nama_perusahaan;
        $pembelian->nama= $request->nama;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->alamat= $request->alamat;
        $pembelian->save();

        // Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('pembelian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        // Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('pembelian.index');
    }
}
