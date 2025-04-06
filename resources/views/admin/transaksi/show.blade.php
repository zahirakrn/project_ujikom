@extends('layouts.backend.template')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Detail Transaksi</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
                            <li class="breadcrumb-item active">Detail Transaksi</li>
                        </ol>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Detail Transaksi</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td>{{ $transaksi->id }}</td>
                                    <td>{{ $transaksi->nama }}</td>
                                    <td>{{ $transaksi->tanggal }}</td>
                                    <td>{{ $transaksi->jenis }}</td>
                                    <td>{{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            </table>
                            <h5 class="mt-4">Barang dalam Transaksi</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi->barangs as $barang)
                                        <tr>
                                            <td>{{ $barang->pembelian->nama }}</td>
                                            <td>{{ $barang->pivot->jumlah }}</td>
                                            <td>{{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                            <td>{{ number_format($barang->pivot->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('transaksi.index') }}" class="btn btn-outline-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
