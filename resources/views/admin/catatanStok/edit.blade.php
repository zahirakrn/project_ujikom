@extends('layouts.backend.template')
@section('content')
<div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0"> Tabel Catatan Stok </h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('catatanstok.index') }}">Catatan Stok</a></li>
                            <li class="breadcrumb-item active">Edit Catatan Stok</li>
                        </ol>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Catatan Stok</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('catatanstok.update', $catatanStok->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama Barang</label>
                                    <select name="id_barang" class="form-control">
                                        <option selected disabled>Pilih Barang</option>
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Jenis</label>
                                    <select id="simpleinput" class="form-select" aria-label="Default select example" name="jenis">
                                        <option selected>Select Menu</option>
                                        <option value="Barang Masuk">Barang Masuk</option>
                                        <option value="Barang Keluar">Barang Keluar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Jumlah</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Jumlah" name="jumlah" value="{{ $catatanStok->jumlah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Tanggal</label>
                                    <input type="date" id="example-palaceholder" class="form-control"
                                        placeholder="Tanggal" name="tanggal" value="{{ $catatanStok->tanggal }}">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Keterangan</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Keterangan" name="keterangan" value="{{ $catatanStok->keterangan }}">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('catatanstok.index') }} "class="btn btn-outline-danger">Kembali</a>
                                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection








