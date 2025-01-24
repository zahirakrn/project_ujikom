<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggajian = Penggajian::all();  // Mengambil semua data penggajian
        return view('admin.penggajian.index', compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penggajian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'jumlah_gaji' => 'required',
            'tanggal_gaji' => 'required',
            'status' => 'required',
            'kontak' => 'required',
        ]);

        // Simpan data penggajian baru
        $penggajian = new Penggajian();
        $penggajian->nama_pegawai = $request->nama_pegawai;
        $penggajian->jumlah_gaji = $request->jumlah_gaji;
        $penggajian->tanggal_gaji = $request->tanggal_gaji;
        $penggajian->status = $request->status;
        $penggajian->kontak = $request->kontak;
        $penggajian->save();

        // Redirect ke halaman index setelah menyimpan
        return redirect()->route('penggajian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        return view('admin.penggajian.show', compact('penggajian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        return view('admin.penggajian.edit', compact('penggajian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'jumlah_gaji' => 'required',
            'tanggal_gaji' => 'required',
            'status' => 'required',
            'kontak' => 'required',
        ]);

        $penggajian = Penggajian::findOrFail($id);
        $penggajian->nama_pegawai = $request->nama_pegawai;
        $penggajian->jumlah_gaji = $request->jumlah_gaji;
        $penggajian->tanggal_gaji = $request->tanggal_gaji;
        $penggajian->status = $request->status;
        $penggajian->kontak = $request->kontak;
        $penggajian->save();

        // Redirect ke halaman index setelah update
        return redirect()->route('penggajian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $penggajian->delete();

        // Redirect ke halaman index setelah menghapus
        return redirect()->route('penggajian.index');
    }
}
