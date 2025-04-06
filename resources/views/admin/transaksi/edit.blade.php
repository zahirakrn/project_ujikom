@extends('layouts.backend.template')

@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Edit Transaksi
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Transaksi</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" id="nama" class="form-control" name="nama"
                                        value="{{ $transaksi->nama }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" id="tanggal" class="form-control" name="tanggal"
                                        value="{{ $transaksi->tanggal }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <select id="jenis" class="form-control" name="jenis" required>
                                        <option value="Pembelian" {{ $transaksi->jenis == 'Pembelian' ? 'selected' : '' }}>
                                            Pembelian</option>
                                        <option value="Penjualan" {{ $transaksi->jenis == 'Penjualan' ? 'selected' : '' }}>
                                            Penjualan</option>
                                    </select>
                                </div>

                                <!-- Daftar Barang -->
                                <div class="mb-3">
                                    <label class="form-label">Pilih Barang</label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Pilih</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang as $item)
                                                @php
                                                    $selected = $transaksi->barangs->contains($item->id);
                                                    $jumlah = $selected
                                                        ? $transaksi->barangs->find($item->id)->pivot->jumlah
                                                        : '';
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="barang[]" value="{{ $item->id }}"
                                                            class="barang-checkbox" {{ $selected ? 'checked' : '' }}>
                                                    </td>
                                                    <td>{{ $item->pembelian->nama }}</td>
                                                    <td class="harga">{{ $item->harga_jual }}</td>
                                                    <td>{{ $item->stok }}</td>
                                                    <td>
                                                        <input type="number" name="jumlah[]"
                                                            class="form-control jumlah-barang" min="1"
                                                            max="{{ $item->stok }}" value="{{ $jumlah }}"
                                                            {{ !$selected ? 'disabled' : '' }}>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Total Harga -->
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="text" id="total" class="form-control" name="total"
                                        value="{{ $transaksi->total }}" readonly>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('transaksi.index') }}"
                                        class="btn btn-outline-danger me-2">Kembali</a>
                                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let checkboxes = document.querySelectorAll('.barang-checkbox');
            let jumlahInputs = document.querySelectorAll('.jumlah-barang');
            let totalInput = document.getElementById('total');

            checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    jumlahInputs[index].disabled = !checkbox.checked;
                    updateTotal();
                });
            });

            jumlahInputs.forEach((input) => {
                input.addEventListener('input', updateTotal);
            });

            function updateTotal() {
                let total = 0;
                checkboxes.forEach((checkbox, index) => {
                    if (checkbox.checked) {
                        let harga = parseFloat(document.querySelectorAll('.harga')[index].textContent);
                        let jumlah = parseInt(jumlahInputs[index].value) || 0;
                        total += harga * jumlah;
                    }
                });
                totalInput.value = total;
            }
        });
    </script>
@endsection
