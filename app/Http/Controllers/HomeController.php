<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pembelian;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $kategori = Kategori::count();
    //     $barang = Barang::count();
    //     $barangCount = Barang::count();
    //     $barangList = Barang::with('pembelian')->latest()->take(5)->get();

    //     $pembelian = Pembelian::count();
    //     $transaksi = Transaksi::count();

    //     $dataPembelian = Pembelian::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')->groupByRaw('MONTH(tanggal)')->pluck('total', 'bulan');

    //     $bulan = [];
    //     $jumlah = [];

    //     for ($i = 1; $i <= 12; $i++) {
    //         $bulan[] = Carbon::create()->month($i)->format('F');
    //         $jumlah[] = $dataPembelian[$i] ?? 0;
    //     }

    //     $dataTransaksi = Transaksi::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')->groupByRaw('MONTH(tanggal)')->pluck('total', 'bulan');

    //     $bulanTransaksi = [];
    //     $jumlahTransaksi = [];

    //     for ($i = 1; $i <= 12; $i++) {
    //         $bulanTransaksi[] = Carbon::create()->month($i)->format('F');
    //         $jumlahTransaksi[] = $dataTransaksi[$i] ?? 0;
    //     }

    //     return view('home', compact('kategori', 'barang', 'pembelian', 'transaksi', 'bulan', 'jumlah', 'bulanTransaksi', 'jumlahTransaksi'));
    // }
    public function index()
{
    $kategori = Kategori::count();
    $barang = Barang::with('pembelian', 'kategori')->latest()->take(5)->get();
    $barangCount = $barang->count();
    $pembelian = Pembelian::count();
    $transaksi = Transaksi::count();

    $dataPembelian = Pembelian::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')->groupByRaw('MONTH(tanggal)')->pluck('total', 'bulan');

    $bulan = [];
    $jumlah = [];

    for ($i = 1; $i <= 12; $i++) {
        $bulan[] = Carbon::create()->month($i)->format('F');
        $jumlah[] = $dataPembelian[$i] ?? 0;
    }

    $dataTransaksi = Transaksi::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')->groupByRaw('MONTH(tanggal)')->pluck('total', 'bulan');

    $bulanTransaksi = [];
    $jumlahTransaksi = [];

    for ($i = 1; $i <= 12; $i++) {
        $bulanTransaksi[] = Carbon::create()->month($i)->format('F');
        $jumlahTransaksi[] = $dataTransaksi[$i] ?? 0;
    }
    $stokMenipis = Barang::with('pembelian')
    ->where('stok', '<=', 50)
    ->get();

    // $stokMenipis = Barang::where('stok', '<=', 50)->select('nama','stok')->get();
// $barang           = Barang::all(); // Atau bisa disesuaikan dengan data yang ingin ditampilkan
    // return redirect()->route('home')->with('success', 'Selamat datang kembali, Jira!');




    return view('home', compact(
        'kategori',
        'barang',
        'barangCount',
        'pembelian',
        'transaksi',
        'bulan',
        'jumlah',
        'bulanTransaksi',
        'jumlahTransaksi',
        'stokMenipis',

    ));
    return redirect()->route('home')->with('success', 'Login berhasil!');
    if ($item->stok <= 50) {
    session()->flash('warning', 'Stok barang ' . $item->pembelian->nama . ' menipis!');
}

}
 public function profile()
    {
        $title = 'Profil';
        $user = auth()->user();
        return view('profile.index', compact('user', 'title'));

        return abort(403);
    }

}
