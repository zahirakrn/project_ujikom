@extends('layouts.backend.template')
@section('content')
<div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0"> Tabel Catatan Keuangan</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('catatankeuangan.index') }}">Catatan Keuangan</a></li>
                            <li class="breadcrumb-item active">Edit Keuangan</li>
                        </ol>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Catatan Keuangan</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('catatankeuangan.update', $catatanKeuangan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Jenis</label>
                                    <input type="text" id="example-palaceholder" class="form-control" placeholder="Jenis"
                                        name="jenis" value="{{ $catatanKeuangan->jenis }}">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Jumlah</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Jumlah" name="jumlah" value="{{ $catatanKeuangan->jumlah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Tanggal</label>
                                    <input type="dete" id="example-palaceholder" class="form-control"
                                        placeholder="Tanggal" name="tanggal" value="{{ $catatanKeuangan->tanggal }}">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Keteranngan</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Keterangan" name="keterangan"
                                        value="{{ $catatanKeuangan->keterangan }}">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('catatankeuangan.index') }}" class="btn btn-outline-danger">Kembali</a>
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





