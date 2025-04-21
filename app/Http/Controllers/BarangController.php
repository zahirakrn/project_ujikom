<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\barang;
use App\Models\pembelian;
use App\Models\kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // public function generateKodeBarang($kategoriId)
    // {
    //     $kategori = Kategori::findOrFail($kategoriId);
    //     $count = Barang::where('id_kategori', $kategoriId)->count() + 1;
    //     $kodeBarang = strtoupper(substr($kategori->nama, 0, 3)) . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

    //     return response()->json(['kode_barang' => $kodeBarang]);
    // }
    public function generateKodeBarang($kategoriId)
{
    $kategori = Kategori::findOrFail($kategoriId);

    // Cari barang terakhir berdasarkan kategori, urut dari kode_barang terbesar
    $lastBarang = Barang::where('id_kategori', $kategoriId)
        ->orderBy('kode_barang', 'desc')
        ->first();

    if ($lastBarang) {
        // Pecah kode barang, ambil angka terakhir
        $lastNumber = (int) substr($lastBarang->kode_barang, -4); // ambil 4 digit dari belakang
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1; // kalau belum ada barang sama sekali
    }

    // Buat kode baru
    $kodeBarang = strtoupper(substr(str_replace(' ', '', $kategori->nama), 0, 3)) . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

    return response()->json(['kode_barang' => $kodeBarang]);
}


    public function getHargaBeli($pembelianId)
    {
        $pembelian = Pembelian::findOrFail($pembelianId);

        $totalStok = Pembelian::where('nama', $pembelian->nama)->sum('jumlah');

        return response()->json([
            'harga_beli' => $pembelian->harga_beli,
            'jumlah' => $totalStok,
        ]);
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $barang = Barang::with(['kategori', 'pembelian'])
            ->get()
            ->unique(function ($item) {
                return optional($item->pembelian)->nama;
            })
            ->values();

        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $kategori = Kategori::all();

        $pembelian = Pembelian::selectRaw('MIN(id) as id, nama')->groupBy('nama')->orderBy('nama')->get();
        return view('admin.barang.create', compact('pembelian', 'kategori', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'id_pembelian' => 'required',
            'kode_barang' => 'required|string',
            'harga_jual' => 'required|numeric',
            'unit' => 'required|string',
        ]);

        $pembelian = Pembelian::findOrFail($request->id_pembelian);
        $namaBarang = $pembelian->nama;

        $totalStok = Pembelian::where('nama', $namaBarang)->sum('jumlah');

        $barang = Barang::where('kode_barang', trim($request->kode_barang))
            ->where('id_kategori', $request->id_kategori)
            ->first();
        if ($barang) {
            $barang->update([
                'stok' => $totalStok,
                'id_pembelian' => $request->id_pembelian,
                'harga_jual' => $request->harga_jual,
                'unit' => $request->unit,
            ]);
            Alert::success('Success', 'Stok Barang Diupdate dari Pembelian')->autoClose(1000);
        } else {
            Barang::create([
                'id_kategori' => $request->id_kategori,
                'id_pembelian' => $request->id_pembelian,
                'kode_barang' => trim($request->kode_barang),
                'harga_jual' => $request->harga_jual,
                'stok' => $totalStok,
                'unit' => $request->unit,
            ]);
            Alert::toast('Data Berhasil Ditambahkan', 'success')->position('top-end')->autoClose(3000);
        }

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
        $pembelian = Pembelian::all();
        $kategori = Kategori::all();

        return view('admin.barang.edit', compact('pembelian', 'kategori', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'id_pembelian' => 'required',
            'kode_barang' => 'required|string',
            'harga_jual' => 'required|numeric',
            'unit' => 'required|string',
        ]);

        $barang = Barang::findOrFail($id);

        $pembelian = Pembelian::findOrFail($request->id_pembelian);
        $namaBarang = $pembelian->nama;

        $totalStok = Pembelian::where('nama', $namaBarang)->sum('jumlah');

        $barang->update([
            'id_kategori' => $request->id_kategori,
            'id_pembelian' => $request->id_pembelian,
            'kode_barang' => trim($request->kode_barang),
            'harga_jual' => $request->harga_jual,
            'stok' => $totalStok,
            'unit' => $request->unit,
        ]);

        Alert::toast('Data Berhasil Diubah', 'success')->position('top-end')->autoClose(3000)->background('#3498db');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        Alert::toast('Data Berhasil Dihapus', 'success')->position('top-end')->autoClose(3000)->background('#e74c3c');
        return redirect()->route('barang.index');
    }
}
