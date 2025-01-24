<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class CatatanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catatanKeuangan = CatatanKeuangan::all();  // Mengambil semua data catatan keuangan
        return view('admin.catatanKeuangan.index', compact('catatanKeuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catatanKeuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'nullable',
            'tanggal' => 'required',
        ]);

        // Simpan data catatan keuangan baru
        $catatanKeuangan = new CatatanKeuangan();
        $catatanKeuangan->jenis = $request->jenis;
        $catatanKeuangan->jumlah = $request->jumlah;
        $catatanKeuangan->keterangan = $request->keterangan;
        $catatanKeuangan->tanggal = $request->tanggal;
        $catatanKeuangan->save();

        // Redirect ke halaman index setelah menyimpan
        return redirect()->route('catatankeuangan.index');
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
        $catatanKeuangan = CatatanKeuangan::findOrFail($id);
        return view('admin.catatanKeuangan.edit', compact('catatanKeuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'nullable',
            'tanggal' => 'required',
        ]);

        // Update data catatan keuangan
        $catatanKeuangan = CatatanKeuangan::findOrFail($id);
        $catatanKeuangan->jenis = $request->jenis;
        $catatanKeuangan->jumlah = $request->jumlah;
        $catatanKeuangan->keterangan = $request->keterangan;
        $catatanKeuangan->tanggal = $request->tanggal;
        $catatanKeuangan->save();

        // Redirect ke halaman index setelah update
        return redirect()->route('catatankeuangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $catatanKeuangan = CatatanKeuangan::findOrFail($id);
        $catatanKeuangan->delete();

        // Redirect ke halaman index setelah menghapus
        return redirect()->route('catatankeuangan.index');
    }
}
