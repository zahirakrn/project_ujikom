@extends('layouts.backend.template')

@section('styles')
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex justify-content-between flex-wrap align-items-center">
                <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Tabel Catatan Keuangan</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="mdi mdi-home-outline me-1"></i>Dasbor</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item active"> Catatan Keuangan</li>
                        </ol>
                    </div>
                </div>
                <div class="py-3">
                    <div class="d-flex justify-content-between flex-wrap align-items-end">
                        <div></div>
                        <div class="dropdown mt-sm-0">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" onclick="toggleExportDropdown()">
                                Export Laporan Keuangan
                            </button>
                            <div id="exportDropdown" class="dropdown-menu show-on-click"
                                style="display: none; position: absolute; z-index: 10;">
                                <a class="dropdown-item" href="{{ route('laporan.keuangan.pdf', request()->only('tanggal_mulai', 'tanggal_selesai')) }}">Export ke PDF</a>
                                {{-- <a class="dropdown-item" href="#">Export ke Excel</a> --}}
                            </div>
                        </div>
                    </div>
            <form action="{{ route('catatankeuangan.index') }}" method="GET" class="row g-3 align-items-end mb-4">
                <div class="col-md-3">
                    <label for="tanggal_awal" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                        value="{{ request('tanggal_awal') }}">
                </div>
                <div class="col-md-3">
                    <label for="tanggal_akhir" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                        value="{{ request('tanggal_akhir') }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <a href="{{ route('catatankeuangan.index') }}" class="btn btn-secondary w-100">Reset</a>
                </div>
            </form>

            {{-- Tabel Penggajian --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Penggajian</h5>
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
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_pegawai }}</td>
                                            <td>{{ number_format($data->jumlah_gaji, 0, ',', '.') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->tanggal_gaji)->format('d F Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabel Pembelian --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Pembelian</h5>
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
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ number_format($data->harga_beli, 0, ',', '.') }}</td>
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
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#penggajian').DataTable();
        $('#pembelian').DataTable();
    });

    function toggleExportDropdown() {
        const dropdown = document.getElementById('exportDropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    window.addEventListener('click', function (e) {
        if (!e.target.matches('.dropdown-toggle')) {
            let dropdown = document.getElementById('exportDropdown');
            if (dropdown && dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            }
        }
    });
</script>
@endpush
