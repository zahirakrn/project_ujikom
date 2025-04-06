@extends('layouts.backend.template')

@section('styles')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Tabel Keuangan</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item active">Keuangan</li>
                        </ol>
                        <br>
                        <a href="{{ route('laporan.keuangan.pdf') }}" class="btn btn-outline-primary">
                            Export Laporan Keuangan
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Penggajian</h5>
                                <a href="{{ route('penggajian.create') }}" class="btn btn-outline-primary">+ Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="penggajian">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jumlah Gaji</th>
                                            <th>Tanggal Gaji</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penggajian as $data)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $data->nama_pegawai }}</td>
                                                <td>{{ $data->jumlah_gaji }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal_gaji)->format('d F Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Pembelian</h5>
                                <a href="{{ route('pembelian.create') }}" class="btn btn-outline-primary">+ Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="pembelian">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelian as $data)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->harga_beli }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function printTable() {
            window.print();
        }
    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#penggajian').DataTable();
            $('#pembelian').DataTable();
        });
    </script>
@endpush
