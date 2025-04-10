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
                        <h4 class="fs-18 fw-semibold m-0">Tabel Catatan Stok</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item active">Catatan Stok</li>
                        </ol>
                        <br>
                        <div class="dropdown" style="margin-bottom: 20px;">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                onclick="toggleExportDropdown()">
                                Export Laporan Catatan Stok
                            </button>
                            <div id="exportDropdown" class="dropdown-menu show-on-click"
                                style="display: none; position: absolute; z-index: 10;">
                                <a class="dropdown-item" href="{{ route('laporan.catatanstok.pdf') }}">Export ke PDF</a>
                                <a class="dropdown-item" href="">Export ke Excel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Catatan Stok</h5>
                                <a href="{{ route('catatanstok.create') }}" class="btn btn-outline-primary">+ Tambah
                                    Data</a>
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
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $data->barang->pembelian->nama }}</td>
                                                <td>{{ $data->jenis }}</td>
                                                <td>{{ $data->jumlah }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                                                <td>{{ $data->keterangan }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <!-- Tombol Edit -->
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-2"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit"
                                                            href="{{ route('catatanstok.edit', $data->id) }}">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>

                                                        <!-- Form untuk Delete -->
                                                        <form action="{{ route('catatanstok.destroy', $data->id) }}"
                                                            method="POST" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-sm bg-danger-subtle btn-delete"
                                                                data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                                                data-bs-original-title="Hapus">
                                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                            </button>
                                                        </form>
                                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                        <script>
                                                            document.querySelectorAll('.btn-delete').forEach(button => {
                                                                button.addEventListener('click', function(event) {
                                                                    event.preventDefault(); // Mencegah form langsung terkirim

                                                                    let form = this.closest("form"); // Ambil form terdekat dari tombol
                                                                    let itemId = this.getAttribute('data-id'); // Ambil ID item

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
                                                                            form.submit(); // Kirim form hanya jika dikonfirmasi
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>
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
@endsection

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true, // Aktifkan Pagination
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ], // Show entries
                "searching": true, // Aktifkan Search Box
                "ordering": true, // Sorting Aktif
                "info": true, // Show Info Text
                "language": {
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:"
                }
            });
        });
    </script>
    <script>
    function toggleExportDropdown() {
        var dropdown = document.getElementById('exportDropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    // Tutup dropdown kalau klik di luar
    window.addEventListener('click', function(e) {
        if (!e.target.matches('.dropdown-toggle')) {
            var dropdown = document.getElementById('exportDropdown');
            if (dropdown && dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            }
        }
    });
</script>

@endpush
