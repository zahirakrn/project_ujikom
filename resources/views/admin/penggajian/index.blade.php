@extends('layouts.backend.template')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">Tabel /</span> Penggajian
                </h4>
                <div class="col-md-12">
                    <div class="card overflow-hidden mb-0">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title text-black mb-0">Penggajian</h5>
                                <a href="{{ route('penggajian.create') }}" class="btn btn-primary ms-auto">+ Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-traffic mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jumlah Gaji</th>
                                            <th>Tanggal Gaji</th>
                                            <th>Status</th>
                                            <th>Kontak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penggajian as $data)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $data->nama_pegawai }}</td>
                                                <td>{{ $data->jumlah_gaji }}</td>
                                                <td>{{ $data->tanggal_gaji }}</td>
                                                <td>{{ $data->status }}</td>
                                                <td>{{ $data->kontak }}</td>
                                                <td>
                                                    <a href="{{ route('penggajian.edit', $data->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('penggajian.destroy', $data->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer py-0 border-top">
                            <div class="row align-items-center">
                                <div class="col-sm">
                                    <div class="text-block text-center text-sm-start">
                                        <span class="fw-medium">1 of 3</span>
                                    </div>
                                </div>
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination gap-2 justify-content-center py-3 ps-0 pe-3">
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link me-2 rounded-2" href="javascript:void(0);"> Prev </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link rounded-2 me-2" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link me-2 rounded-2" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link text-primary rounded-2" href="javascript:void(0);"> Next
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




