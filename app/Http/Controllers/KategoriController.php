<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();  // Mengambil semua data kategori
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        // Simpan data kategori baru
        $kategori = new Kategori();
        $kategori->nama= $request->nama;
        $kategori->save();

        Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('kategori.index');

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
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);


        $kategori= Kategori::findOrFail($id);
        $kategori->nama = $request->nama;
        $kategori->save();

        Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('kategori.index');


    }
}
