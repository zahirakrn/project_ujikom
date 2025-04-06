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
                        <h4 class="fs-18 fw-semibold m-0">Tabel Transaksi</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Transaksi</h5>
                                <a href="{{ route('transaksi.create') }}" class="btn btn-outline-primary">+ Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $data)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                                                <td>{{ $data->jenis }}</td>

                                                <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>

                                                <td>
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <a aria-label="anchor" class="btn btn-sm bg-info-subtle me-2"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Lihat Detail"
                                                            href="{{ route('transaksi.show', $data->id) }}">
                                                            <i class="mdi mdi-eye-outline fs-14 text-info"></i>
                                                        </a>
                                                        <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-2"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit"
                                                            href="{{ route('transaksi.edit', $data->id) }}">
                                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                        </a>
                                                        <form action="{{ route('transaksi.destroy', $data->id) }}"
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
                            </div>
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
@endpush
