<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Catatan Stok</title>
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
            border-bottom: 2px solid #2E86C1;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            height: auto;
        }

        .judul {
            flex: 1;
            text-align: center;
        }

        .judul h1 {
            margin: 0;
            font-size: 20px;
        }

        .judul h2 {
            margin: 5px 0 0 0;
            font-size: 16px;
        }

        h3 {
            text-align: center;
            margin-top: 0;
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
    </style>
</head>

<body>
    <div class="header">
        <div class="judul">
            <h1>TB Kurnia Jaya</h1>
            <h2>Laporan Catatan Stok</h2>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catatanStok as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->barang->pembelian->nama ?? '-' }}</td>
                <td>{{ ucfirst($data->jenis) }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                <td>{{ $data->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
