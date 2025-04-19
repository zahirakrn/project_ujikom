<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Catatan Stok</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 14px;
            background-color: white;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ddd;
        }

        .header {
            background-color: #2E86C1;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        .judul h1 {
            margin: 0;
            font-size: 22px;
        }

        .judul h2 {
            margin: 8px 0 0 0;
            font-size: 16px;
            font-weight: normal;
        }

        .content {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #2E86C1;
            color: white;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            padding: 10px;
            text-align: right;
            font-size: 12px;
            color: #666;
        }

        .info-box {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f8f8f8;
            border-left: 4px solid #2E86C1;
        }

        .jenis-masuk {
            color: green;
            font-weight: bold;
        }

        .jenis-keluar {
            color: red;
            font-weight: bold;
        }

        @media print {
            body {
                padding: 0;
            }
            .container {
                border: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="judul">
                <h1>TB KURNIA JAYA</h1>
                <h2>LAPORAN CATATAN STOK</h2>
            </div>
        </div>

        <div class="content">
            <div class="info-box">
                Tanggal Laporan: {{ \Carbon\Carbon::now()->format('d F Y') }}
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
                        <td class="{{ $data->jenis == 'masuk' ? 'jenis-masuk' : 'jenis-keluar' }}">
                            {{ ucfirst($data->jenis) }}
                        </td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y') }}
        </div>
    </div>
</body>
</html>
