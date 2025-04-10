<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            font-size: 14px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .logo {
            width: 80px;
            height: auto;
        }

        .title {
            flex: 1;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 22px;
        }

        h2 {
            margin: 4px 0 0 0;
            font-size: 18px;
        }

        hr {
            border: 1px solid #444;
            margin-top: 10px;
        }

        h3 {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #2E86C1;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .highlight-total {
            font-weight: bold;
            background-color: #dbe9f4;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="title">
            <h1>TB Kurnia Jaya</h1>
            <h2>Laporan Keuangan</h2>
        </div>
    </div>

    <hr>
    <h3>Penggajian</h3>
    <h3>Total Penggajian Karyawan</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah Gaji</th>
                <th>Tanggal Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penggajian as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_pegawai }}</td>
                    <td>Rp {{ number_format($data->jumlah_gaji, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_gaji)->format('d F Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Pembelian</h3>
    <h3>Total Pembelian Barang</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>Rp {{ number_format($data->harga_beli, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Pengeluaran</h3>
    <h3>Total Pengeluaran Bulanan</h3>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaran as $bulan => $total)
                <tr>
                    <td>{{ $bulan }}</td>
                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="highlight-total">
                <td>Total Keseluruhan</td>
                <td>Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
