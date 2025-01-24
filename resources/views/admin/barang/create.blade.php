@extends('layouts.backend.template')
@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Tambah Barang
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Barang</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('barang.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama Kategori</label>
                                    <select name="id_kategori" class="form-control">
                                        <option selected disabled>Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama Perusahaan</label>
                                    <select name="id_pembelian" class="form-control">
                                        <option selected disabled>Pilih Perusahan</option>
                                        @foreach ($pembelian as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Nama Barang</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Nama Barang" name="nama_barang">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Harga Beli</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Harga Beli" name="harga_beli">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Harga Jual</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Harga Jual" name="harga_jual">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">stok</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Stok" name="stok">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Unit</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Unit" name="unit">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('barang.index') }} " class="btn btn-primary">Back</a>
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

