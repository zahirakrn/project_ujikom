<?php

namespace App\Http\Controllers;

use App\Models\CatatanStok;
use App\Models\Barang;
use Illuminate\Http\Request;

class CatatanStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catatanStok = CatatanStok::all();  // Mengambil semua data kategori
        return view('admin.catatanStok.index', compact('catatanStok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catatanStok= CatatanStok::all();
        $barang = Barang::all();

        return view('admin.catatanStok.create', compact('catatanStok','barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jenis'=> 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);


        $catatanStok = new CatatanStok();
        $catatanStok->id_barang = $request->id_barang;
        $catatanStok->jenis = $request->jenis;
        $catatanStok->jumlah = $request->jumlah;
        $catatanStok->tanggal = $request->tanggal;
        $catatanStok->keterangan = $request->keterangan;
        $catatanStok->save();

        // Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('catatanstok.index');
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
        $catatanStok = CatatanStok::findOrFail($id);
        $barang= Barang::all();

        return view('admin.catatanStok.edit', compact('catatanStok','barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'jenis'=> 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);


        $catatanStok = CatatanStok::findOrFail($id);
        $catatanStok->id_barang = $request->id_barang;
        $catatanStok->jenis = $request->jenis;
        $catatanStok->jumlah = $request->jumlah;
        $catatanStok->tanggal = $request->tanggal;
        $catatanStok->keterangan = $request->keterangan;
        $catatanStok->save();

        // Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('catatanstok.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $catatanStok= CatatanStok::findOrFail($id);
        $catatanStok->delete();

        // Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('catatanstok.index');
    }
}
