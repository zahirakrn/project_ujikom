@extends('layouts.backend.template')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                    </div>
                </div>
                <div class="col-lg-15 mb-4 order-0">
                    <div class="card rounded-3">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Selamat Datang di TB Kurnia Jaya 🎉</h5>
                                    <p class="mb-4">
                                        {{ Auth::user()->name }} TB Kurnia Jaya
                                    </p>
                                    <a href="{{ route('profile.index') }}" class="btn btn-sm btn-outline-primary">View
                                        Profile</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{ asset('admiiin/assets/logo/tb.png') }}" height="90" width="90"
                                        alt="Logo TB Kurnia Jaya" class="img-fluid" style="margin-top: -120px; margin-right: -180px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Row -->
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="widget-first">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div
                                                    class="bg-info-subtle rounded-2 p-1 me-2 border border-dashed border-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path fill="#73bbe2"
                                                            d="M7 20V8.975q0-.825.6-1.4T9.025 7H20q.825 0 1.413.587T22 9v8l-5 5H9q-.825 0-1.412-.587T7 20M2.025 6.25q-.15-.825.325-1.487t1.3-.813L14.5 2.025q.825-.15 1.488.325t.812 1.3L17.05 5H9Q7.35 5 6.175 6.175T5 9v9.55q-.4-.225-.687-.6t-.363-.85zM20 16h-4v4z" />
                                                    </svg>
                                                </div>
                                                <a class="dropdown-item" href="{{ route('kategori.index') }}"">Total
                                                    Kategori </a>
                                            </div>
                                            <h3 class="mb-0 fs-24 text-black me-2">{{ $kategori }} Items</h3>
                                        </div>

                                        <div>
                                            <div id="new-orders" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="widget-first">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div
                                                    class="bg-warning-subtle rounded-2 p-1 me-2 border border-dashed border-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path fill="#f59440"
                                                            d="M5.574 4.691c-.833.692-1.052 1.862-1.491 4.203l-.75 4c-.617 3.292-.926 4.938-.026 6.022C4.207 20 5.88 20 9.23 20h5.54c3.35 0 5.025 0 5.924-1.084c.9-1.084.591-2.73-.026-6.022l-.75-4c-.439-2.34-.658-3.511-1.491-4.203C17.593 4 16.403 4 14.02 4H9.98c-2.382 0-3.572 0-4.406.691"
                                                            opacity="0.5" />
                                                        <path fill="#988D4D"
                                                            d="M12 9.25a2.251 2.251 0 0 1-2.122-1.5a.75.75 0 1 0-1.414.5a3.751 3.751 0 0 0 7.073 0a.75.75 0 1 0-1.414-.5A2.251 2.251 0 0 1 12 9.25" />
                                                    </svg>
                                                </div>
                                                <a class="dropdown-item" href="{{ route('barang.index') }}"">Total
                                                    Barang</a>
                                            </div>
                                            <h3 class="mb-0 fs-24 text-black me-2">{{ $barang }} Items</h3>
                                        </div>

                                        <div>
                                            <div id="monthly-orders" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="widget-first">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div
                                                    class="bg-secondary-subtle rounded-2 p-1 me-2 border border-dashed border-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 640 512">
                                                        <path fill="#963b68"
                                                            d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4" />
                                                    </svg>
                                                </div>
                                                <a class="dropdown-item" href="{{ route('pembelian.index') }}"">Total
                                                    Pembelian</a>
                                            </div>
                                            <h3 class="mb-0 fs-24 text-black me-2">{{ $pembelian }} Items</h3>
                                        </div>

                                        <div>
                                            <div id="monthly-revenue" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="widget-first">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div
                                                    class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 14 14">
                                                        <path fill="#287F71" fill-rule="evenodd"
                                                            d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <a class="dropdown-item" href="{{ route('transaksi.index') }}"">Total
                                                    Transaksi</a>
                                            </div>
                                            <h3 class="mb-0 fs-24 text-black me-2">{{ $transaksi }} Items</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Grafik Pembelian Barang per Bulan</h5>
                                </div>
                                <div class="card-body">
                                    <div style="position: relative; height: 350px;">
                                        <canvas id="grafikPembelian"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Grafik Transaksi per Bulan</h5>
                                </div>
                                <div class="card-body">
                                    <div style="position: relative; height: 350px;">
                                        <canvas id="grafikTransaksi"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const ctx = document.getElementById('grafikPembelian').getContext('2d');
            const grafikPembelian = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($bulan),
                    datasets: [{
                        label: 'Jumlah Pembelian',
                        data: @json($jumlah),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderRadius: 6,
                        barThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            top: 10,
                            bottom: 10
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Jumlah: ' + context.parsed.y;
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
    @push('scripts')
        <script>
            const ctxTransaksi = document.getElementById('grafikTransaksi').getContext('2d');
            const grafikTransaksi = new Chart(ctxTransaksi, {
                type: 'bar',
                data: {
                    labels: @json($bulanTransaksi),
                    datasets: [{
                        label: 'Jumlah Transaksi',
                        data: @json($jumlahTransaksi),
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        borderRadius: 6,
                        barThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            top: 10,
                            bottom: 10
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Jumlah: ' + context.parsed.y;
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
