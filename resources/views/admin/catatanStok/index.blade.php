@extends('layouts.backend.template')

@section('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Tabel Catatan Stok</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item active"> Catatan Stok</li>
                        </ol>
                    </div>
                </div>
                <div class="py-3">
                    <div class="d-flex justify-content-between flex-wrap align-items-end">
                        <div></div>
                        <div class="dropdown mt-sm-0">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" onclick="toggleExportDropdown()">
                                Export Laporan Catatan Stok
                            </button>
                            <div id="exportDropdown" class="dropdown-menu show-on-click"
                                style="display: none; position: absolute; z-index: 10;">
                                <a class="dropdown-item" href="{{ route('laporan.catatanstok.pdf', request()->only('tanggal_mulai', 'tanggal_selesai')) }}">Export ke PDF</a>
                                <a class="dropdown-item" href="#">Export ke Excel</a>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('catatanstok.index') }}" method="GET" class="row g-3 align-items-end mb-4">
                        <div class="col-md-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                value="{{ request('tanggal_mulai') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                value="{{ request('tanggal_selesai') }}">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2 w-100">Filter</button>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <a href="{{ route('catatanstok.index') }}" class="btn btn-secondary w-100">Reset</a>
                        </div>
                    </form>

                    {{-- TABEL --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Catatan Stok</h5>
                                    <a href="{{ route('catatanstok.create') }}" class="btn btn-outline-primary">+ Tambah Data</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($catatanStok as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->barang->pembelian->nama ?? '-' }}</td>
                                                    <td>{{ $data->jenis }}</td>
                                                    <td>{{ $data->jumlah }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                                                    <td>{{ $data->keterangan }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <a class="btn btn-sm bg-primary-subtle me-2"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Edit"
                                                                href="{{ route('catatanstok.edit', $data->id) }}">
                                                                <i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>

                                                            <form action="{{ route('catatanstok.destroy', $data->id) }}" method="POST" class="delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm bg-danger-subtle btn-delete"
                                                                    data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Hapus">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
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
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "searching": true,
                "ordering": true,
                "info": true,
                "language": {
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:"
                }
            });
        });

        function toggleExportDropdown() {
            var dropdown = document.getElementById('exportDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        window.addEventListener('click', function(e) {
            if (!e.target.matches('.dropdown-toggle')) {
                var dropdown = document.getElementById('exportDropdown');
                if (dropdown && dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                }
            }
        });

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let form = this.closest("form");
                Swal.fire({
                    title: "Hapus Data!",
                    text: "Apakah Anda Yakin?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
