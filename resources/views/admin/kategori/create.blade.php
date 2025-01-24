@extends('layouts.backend.template')
@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Tambah Kategori
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Kategori</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('kategori.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Nama Kategori</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Nama Kategori" name="nama">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('kategori.index') }} " class="btn btn-primary">Back</a>
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
