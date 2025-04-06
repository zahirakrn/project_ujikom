@extends('layouts.backend.template')
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Barang</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Barang</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Nama Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <option selected disabled>Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" {{ $barang->id_kategori == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                    <input type="text" id="kode_barang" class="form-control" name="kode_barang"
                                        value="{{ $barang->kode_barang }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="id_pembelian" class="form-label">Nama Barang</label>
                                    <select name="id_pembelian" id="id_pembelian" class="form-control">
                                        <option selected disabled>Pilih Barang</option>
                                        @foreach ($pembelian as $item)
                                            <option value="{{ $item->id }}" {{ $barang->id_pembelian == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="harga_beli" class="form-label">Harga Beli</label>
                                    <input type="text" id="harga_beli" class="form-control" name="harga_beli"
                                        value="{{ $barang->harga_beli }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="harga_jual" class="form-label">Harga Jual</label>
                                    <input type="text" id="harga_jual" class="form-control" name="harga_jual"
                                        value="{{ $barang->harga_jual }}">
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="text" id="stok" class="form-control" name="stok"
                                        value="{{ $barang->stok }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" id="unit" class="form-control" name="unit"
                                        value="{{ $barang->unit }}">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('barang.index') }}" class="btn btn-outline-danger">Kembali</a>
                                        <button type="submit" class="btn btn-outline-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Generate kode barang berdasarkan kategori (opsional untuk edit)
            $('#id_kategori').change(function() {
                var kategoriId = $(this).val();
                if (kategoriId) {
                    $.ajax({
                        url: '/admin/generate-kode-barang/' + kategoriId,
                        type: 'GET',
                        success: function(response) {
                            $('#kode_barang').val(response.kode_barang);
                        }
                    });
                } else {
                    $('#kode_barang').val('');
                }
            });

            // Isi harga beli dan stok dari pembelian
            $('#id_pembelian').change(function() {
                var pembelianId = $(this).val();
                if (pembelianId) {
                    $.ajax({
                        url: '/admin/get-harga-beli/' + pembelianId,
                        type: 'GET',
                        success: function(response) {
                            $('#harga_beli').val(response.harga_beli);
                            $('#stok').val(response.jumlah);
                        }
                    });
                } else {
                    $('#harga_beli').val('');
                    $('#stok').val('');
                }
            });
        });
    </script>
@endsection
