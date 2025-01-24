<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pembelian;
use App\Models\kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();  // Mengambil semua data 
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $pembelian = Pembelian::all();
        $kategori = Kategori::all();


        return view('admin.barang.create', compact('pembelian', 'kategori','barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'id_pembelian' => 'required',
            'nama_barang'=> 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'unit' => 'required',
        ]);


        $barang = new Barang();
        $barang->id_kategori = $request->id_kategori;
        $barang->id_pembelian = $request->id_pembelian;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok = $request->stok;
        $barang->unit = $request->unit;
        $barang->save();

        // Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('barang.index');
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
        $barang = Barang::findOrFail($id);
        $pembelian= Pembelian::all();
        $kategori = Kategori::all();

        return view('admin.barang.edit', compact('pembelian','kategori', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'id_pembelian' => 'required',
            'nama_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'unit' => 'required',
        ]);


        $barang = Barang::findOrFail($id);
        $barang->id_kategori = $request->id_kategori;
        $barang->id_pembelian = $request->id_pembelian;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok = $request->stok;
        $barang->unit = $request->unit;
        $barang->save();


        // Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        // Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('barang.index');
    }
}
