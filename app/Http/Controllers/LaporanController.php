<?php
namespace App\Http\Controllers;

use App\Models\CatatanStok;
use App\Models\Pembelian;
use App\Models\Penggajian;
use PDF;

class LaporanController extends Controller
{
    // Export laporan keuangan (penggajian & pembelian)
   public function exportKeuanganPdf()
{
    $penggajian = Penggajian::all();
    $pembelian  = Pembelian::all();

    // Gabungkan data pengeluaran per bulan
    $pengeluaran = collect();

    foreach ($penggajian as $data) {
        $bulan = \Carbon\Carbon::parse($data->tanggal_gaji)->translatedFormat('F Y');
        $pengeluaran[$bulan] = ($pengeluaran[$bulan] ?? 0) + $data->jumlah_gaji;
    }

    foreach ($pembelian as $data) {
        $bulan = \Carbon\Carbon::parse($data->tanggal)->translatedFormat('F Y');
        $pengeluaran[$bulan] = ($pengeluaran[$bulan] ?? 0) + $data->harga_beli;
    }
    $totalPengeluaran = $pengeluaran->sum();


    $pdf = PDF::loadView('admin.laporan.keuanganpdf', compact('penggajian', 'pembelian', 'pengeluaran', 'totalPengeluaran'))
    ->setPaper('a4', 'portrait');


    return $pdf->download('laporan_keuangan.pdf');
}


    // Export laporan catatan stok
    public function exportCatatanStokPdf()
    {
        $catatanStok = CatatanStok::all();

        $pdf = PDF::loadView('admin.laporan.catatanstokpdf', compact('catatanStok'))
            ->setPaper('a4', 'landscape'); // Bisa portrait atau landscape

        return $pdf->download('laporan_catatan_stok.pdf');
    }
}

