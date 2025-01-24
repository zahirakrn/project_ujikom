@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Catatan Stok</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Catatan Stok</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('catatanstok.update', $catatanStok->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Barang -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="id_barang">Nama Barang</label>
                    <div class="col-sm-10">
                        <select name="id_barang" id="id_barang" class="form-control">
                            <option disabled>Pilih Barang</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}"
                                    {{ $catatanStok->id_barang == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Jenis -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jenis">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jenis" id="jenis">
                            <option disabled>Pilih...</option>
                            <option value="Barang Masuk" {{ $catatanStok->jenis == 'Barang Masuk' ? 'selected' : '' }}>
                                Barang Masuk
                            </option>
                            <option value="Barang Keluar" {{ $catatanStok->jenis == 'Barang Keluar' ? 'selected' : '' }}>
                                Barang Keluar
                            </option>
                        </select>
                    </div>
                </div>

                <!-- Jumlah -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jumlah">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlah" placeholder="Jumlah"
                            name="jumlah" value="{{ old('jumlah', $catatanStok->jumlah) }}" />
                    </div>
                </div>

                <!-- Tanggal -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" placeholder="Tanggal"
                            name="tanggal" value="{{ old('tanggal', $catatanStok->tanggal) }}" />
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" placeholder="Keterangan"
                            name="keterangan" value="{{ old('keterangan', $catatanStok->keterangan) }}" />
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('catatanstok.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
