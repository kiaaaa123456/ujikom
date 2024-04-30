    @extends('template.layout')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Mazer Admin Dashboard</title>

        <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css">
        <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app-dark.css">
        <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.png" type="image/png">

        <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/shared/iconly.css">

    </head>
    <style>
        .tile_count {
            margin-bottom: 20px;
            /* Menambahkan margin bawah */
        }

        .tile_stats_count {
            background-color: #f9f9f9;
            /* Warna latar belakang */
            border: 1px solid #ddd;
            /* Warna border */
            border-radius: 5px;
            /* Sudut border */
            padding: 15px;
            /* Padding konten */
        }

        .tile_stats_count .count_top {
            font-weight: bold;
            /* Menambahkan ketebalan teks */
        }

        .tile_stats_count .count p {
            margin: 5px 0;
            /* Menambahkan margin atas dan bawah untuk setiap paragraf */
        }

        .tile_stats_count .count p:last-child {
            margin-bottom: 0;
            /* Menghapus margin bawah untuk paragraf terakhir */
        }

        .tile_stats_count .count p i {
            margin-right: 5px;
            /* Menambahkan margin kanan antara ikon dan teks */
        }
    </style>


    <body>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 style="font-family: 'Caveat', cursive; margin: 0;">Point Coffee</h2>
                </div>
                <!-- Tambahkan form filter pada bagian atas tampilan -->
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center;">
                        <form action="{{ url('/') }}" method="GET" style="display: flex; align-items: center;">
                            <label for="tanggal_awal" style="margin-right: 5px;">Dari Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal_awal"
                                value="{{ $tanggal_awal ?? '' }}" name="tanggal_awal"
                                style="width: 150px; margin-right: 10px;">
                            <label for="tanggal_akhir" style="margin-right: 5px;">Sampai Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal_akhir"
                                value="{{ $tanggal_akhir ?? '' }}" name="tanggal_akhir"
                                style="width: 150px; margin-right: 10px;">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <a href="{{ url('menu') }}" class="text-decoration-none">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="iconly-boldShow"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Data Menu</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $count_menu }}</h6>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div
                                                        class="stats-icon blue mb-2 d-flex justify-content-center align-items-start position-relative">
                                                        <i class="bi bi-bar-chart-line position-absolute top-0"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Transaksi</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $count_transaksi }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div
                                                    class="stats-icon green mb-2 d-flex justify-content-center align-items-start position-relative">
                                                    <i class="bi bi-currency-dollar position-absolute top-0" style="color: yellow;"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Jumlah Pendapatan</h6>
                                                <h6 class="font-extrabold mb-0">Rp{{ $pendapatan }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <a href="{{ url('stok') }}">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Sisa Stok</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $sisaStok }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Pendapatan per Tanggal</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pendapatanPerTanggalChart" width="400"
                                            height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Stok Terendah</h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($stokTerendah as $stok)
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center">
                                                    <!-- Tampilkan gambar menu -->
                                                    <img src="{{ asset('images/' . $stok->menu->image) }}"
                                                        alt="{{ $stok->menu->nama_menu }}" class="mr-3"
                                                        style="width: 50px; height: 50px;">
                                                    <!-- Tampilkan nama menu dan jumlah -->
                                                    <div>
                                                        <p class="mb-1">Nama Menu: {{ $stok->menu->nama_menu }}</p>
                                                        <p class="mb-0">Jumlah: {{ $stok->jumlah }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Transaksi Terbaru</h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($latest_transactions as $transaction)
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>{{ $transaction->created_at }}</span>
                                                    <span>Total: Rp{{ $transaction->subtotal }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('mazer') }}/assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">Sazkia Minatul Fitri</h5>
                                        <h6 class="text-muted mb-0">@kiaasmf</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Top 5 Penjualan</h4>
                            </div>
                            <div class="card-content pb-4">
                                <span class="count_top"><i class="fa-solid fa-cart-shopping"></i></span>
                                <div class="count">
                                    @foreach ($most_ordered_menu as $menu => $count)
                                        @php
                                            // Temukan objek menu sesuai dengan nama_menu
                                            $menuObject = \App\Models\Menu::where('nama_menu', $menu)->first();
                                        @endphp
                                        @if ($menuObject)
                                            <div class="d-flex align-items-center mb-2">
                                                <!-- Gunakan URL yang sesuai untuk mengakses gambar -->
                                                <img src="{{ asset('images/' . $menuObject->image) }}"
                                                    alt="{{ $menuObject->nama_menu }}" class="mr-2"
                                                    style="width: 50px; height: 50px;">
                                                <p>{{ $menuObject->nama_menu }}: {{ $count }}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                </section>
            </div>
        </div>
        <script src="{{ asset('mazer') }}/assets/js/bootstrap.js"></script>
        <script src="{{ asset('mazer') }}/assets/js/app.js"></script>

        <!-- Need: Apexcharts -->
        <script src="{{ asset('mazer') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('mazer') }}/assets/js/pages/dashboard.js"></script>
        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Mendapatkan data pendapatan per tanggal dari PHP
                var pendapatanPerTanggalData = {!! $pendapatan_per_tanggal !!};

                // Memformat data untuk Chart.js
                var labels = [];
                var data = [];
                pendapatanPerTanggalData.forEach(function(item) {
                    labels.push(item.tanggal);
                    data.push(item.total_pendapatan);
                });

                // Menggambar grafik pendapatan per tanggal
                var ctx = document.getElementById('pendapatanPerTanggalChart').getContext('2d');
                var pendapatanPerTanggalChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Pendapatan per Tanggal',
                            data: data,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        @endpush

    </body>

    </html>
