<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 14px;
            background-color: white;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #2E86C1;
            color: white;
            padding: 15px 20px;
            text-align: center;
            border-bottom: 5px solid #1a5276;
        }

        .title h1 {
            margin: 0;
            font-size: 24px;
        }

        .title h2 {
            margin: 5px 0 0 0;
            font-size: 18px;
            font-weight: normal;
        }

        .content {
            padding: 20px;
        }

        .report-info {
            background-color: #f8f8f8;
            border-left: 4px solid #2E86C1;
            padding: 10px 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            color: #2E86C1;
            border-bottom: 2px solid #2E86C1;
            padding-bottom: 5px;
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .section-subtitle {
            color: #444;
            margin: 10px 0;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border: 1px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
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

        tbody tr:hover {
            background-color: #e9f2f9;
        }

        .currency {
            text-align: right;
            font-family: 'Courier New', monospace;
        }

        .highlight-total {
            font-weight: bold;
            background-color: #dbe9f4 !important;
        }

        .footer {
            margin-top: 30px;
            padding: 15px;
            text-align: right;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        .summary-boxes {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .summary-box {
            flex: 1;
            margin: 0 10px;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .summary-box.income {
            background-color: #e8f5e9;
            border: 1px solid #81c784;
        }

        .summary-box.expense {
            background-color: #ffebee;
            border: 1px solid #e57373;
        }

        .summary-box.balance {
            background-color: #e3f2fd;
            border: 1px solid #64b5f6;
        }

        .summary-title {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .summary-amount {
            font-size: 18px;
            font-weight: bold;
        }

        @media print {
            body {
                padding: 0;
            }
            .container {
                border: none;
                box-shadow: none;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">
                <h1>TB KURNIA JAYA</h1>
                <h2>LAPORAN KEUANGAN</h2>
            </div>
        </div>

        <div class="content">
            <div class="report-info">
                <div>Periode: {{ \Carbon\Carbon::now()->format('F Y') }}</div>
                <div>Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d F Y') }}</div>
            </div>

            <div class="section">
                <h3 class="section-title">PENGGAJIAN</h3>
                <h4 class="section-subtitle">Total Penggajian Karyawan</h4>
                <table>
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="35%">Nama</th>
                            <th width="30%">Jumlah Gaji</th>
                            <th width="30%">Tanggal Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penggajian as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_pegawai }}</td>
                                <td class="currency">Rp {{ number_format($data->jumlah_gaji, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_gaji)->format('d F Y') }}</td>
                            </tr>
                        @endforeach
                        <tr class="highlight-total">
                            <td colspan="2">Total Penggajian</td>
                            <td class="currency">Rp {{ number_format($penggajian->sum('jumlah_gaji'), 0, ',', '.') }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="section">
                <h3 class="section-title">PEMBELIAN</h3>
                <h4 class="section-subtitle">Total Pembelian Barang</h4>
                <table>
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="45%">Nama Barang</th>
                            <th width="25%">Harga Beli</th>
                            <th width="25%">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td class="currency">Rp {{ number_format($data->harga_beli, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                            </tr>
                        @endforeach
                        <tr class="highlight-total">
                            <td colspan="2">Total Pembelian</td>
                            <td class="currency">Rp {{ number_format($pembelian->sum('harga_beli'), 0, ',', '.') }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="section">
                <h3 class="section-title">PENGELUARAN</h3>
                <h4 class="section-subtitle">Total Pengeluaran Bulanan</h4>
                <table>
                    <thead>
                        <tr>
                            <th width="50%">Bulan</th>
                            <th width="50%">Total Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $bulan => $total)
                            <tr>
                                <td>{{ $bulan }}</td>
                                <td class="currency">Rp {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="highlight-total">
                            <td>Total Keseluruhan</td>
                            <td class="currency">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="summary-boxes">
                <div class="summary-box expense">
                    <div class="summary-title">Total Pengeluaran</div>
                    <div class="summary-amount">Rp {{ number_format($totalPengeluaran + $penggajian->sum('jumlah_gaji') + $pembelian->sum('harga_beli'), 0, ',', '.') }}</div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Dicetak oleh: Admin | Tanggal: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        </div>
    </div>
</body>
</html>
