<?php

namespace App\Http\Controllers;

use Alert;
use Carbon\Carbon;
use App\Models\CatatanStok;
use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = CatatanStok::with('barang.pembelian');

    if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
        $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);
    }

    $catatanStok = $query->latest()->get();

    return view('admin.catatanStok.index', compact('catatanStok'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catatanStok= CatatanStok::all();
        $pembelian = DB::table('pembelians')
         ->select('nama', DB::raw('MIN(id) as id'))
         ->groupBy('nama')
         ->get();
        $barang = Barang::all();

        return view('admin.catatanStok.create', compact('catatanStok','barang','pembelian'));
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

    $tanggal = Carbon::parse($request->tanggal)->format('d F Y');


    $catatanStok = new CatatanStok();
    $catatanStok->id_barang = $request->id_barang;
    $catatanStok->jenis = $request->jenis;
    $catatanStok->jumlah = $request->jumlah;
    $catatanStok->tanggal = $request->tanggal;
    $catatanStok->keterangan = $request->keterangan;
    $catatanStok->save();

    // Ambil data barang terkait
    $barang = Barang::findOrFail($request->id_barang);

    if ($request->jenis == 'barang masuk') {
        $barang->stok += $request->jumlah;  // Tambah stok
    } elseif ($request->jenis == 'barang keluar') {
        // Pastikan stok cukup untuk transaksi barang keluar
        if ($barang->stok >= $request->jumlah) {
            $barang->stok -= $request->jumlah;  // Kurangi stok
        } else {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk barang keluar!');
        }
    }

    // Simpan perubahan stok
    $barang->save();

    Alert::success('Success', 'Data Berhasil Ditambahkan')->autoClose(1000);
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
        'jenis' => 'required',
        'jumlah' => 'required|numeric|min:1',
        'tanggal' => 'required',
        'keterangan' => 'required',
    ]);

    $tanggal = Carbon::parse($request->tanggal)->format('d F Y');

    $catatanStok = CatatanStok::findOrFail($id);
    $barang = Barang::findOrFail($request->id_barang);

    // Kembalikan stok lama sebelum update
    if ($catatanStok->jenis == 'pembelian') {
        $barang->stok -= $catatanStok->jumlah;
    } elseif ($catatanStok->jenis == 'penjualan') {
        $barang->stok += $catatanStok->jumlah;
    }

    // Update dengan stok baru berdasarkan jenis yang dipilih
    if ($request->jenis == 'barangmasuk') {
        $barang->stok += $request->jumlah;
    } elseif ($request->jenis == 'barangkeluar') {
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk penjualan!');
        }
        $barang->stok -= $request->jumlah;
    }

    $barang->save();

    // Update catatan stok
    $catatanStok->id_barang = $request->id_barang;
    $catatanStok->jenis = $request->jenis;
    $catatanStok->jumlah = $request->jumlah;
    $catatanStok->tanggal = $request->tanggal;
    $catatanStok->keterangan = $request->keterangan;
    $catatanStok->save();

    Alert::success('Success', 'Data Berhasil Diperbarui')->autoClose(1000);
    return redirect()->route('catatanstok.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $catatanStok= CatatanStok::findOrFail($id);
        $catatanStok->delete();

        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('catatanstok.index');
    }
}
