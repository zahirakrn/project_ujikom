<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pembelian;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Transaksi;

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::count();
        $barang = Barang::count();
        $barangCount = Barang::count();
        $barangList = Barang::with('pembelian')->latest()->take(5)->get();

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

        return view('home', compact('kategori', 'barang', 'pembelian', 'transaksi', 'bulan', 'jumlah', 'bulanTransaksi', 'jumlahTransaksi'));
    }
}
