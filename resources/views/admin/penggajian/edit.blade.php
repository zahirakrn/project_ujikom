@extends('layouts.backend.template')
@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Edit Penggajian
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Penggajian</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('penggajian.update', $penggajian->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Nama Pegawai</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Nama Pegawai" name="nama_pegawai" value="{{ $penggajian->nama_pegawai }}">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Jumlah Gaji</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Jumlah Gaji" name="jumlah_gaji" value="{{ $penggajian->jumlah_gaji }}">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Tanggal Gaji</label>
                                    <input type="dete" id="example-palaceholder" class="form-control"
                                        placeholder="Tnggal Gaji" name="tanggal_gaji" value="{{ $penggajian->tanggal_gaji }}">
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Status</label>
                                    <select id="simpleinput" class="form-select" aria-label="Default select example" name="status" value="{{$penggajian->status}}">
                                        <option selected>Select Menu</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Kontak</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Kontak" name="kontak" value="{{ $penggajian->kontak }}">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('penggajian.index') }} " class="btn btn-primary">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
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






