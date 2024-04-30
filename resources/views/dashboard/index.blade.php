        @extends('template.layout')
        @push('style')
            <style>
                /* Style untuk daftar pelanggan */
                ul.list-unstyled.top_profiles.scroll-view {
                    padding-left: 0;
                }

                ul.list-unstyled.top_profiles.scroll-view li.media.event {
                    padding: 10px;
                    border-bottom: 1px solid #eee;
                }

                ul.list-unstyled.top_profiles.scroll-view li.media.event:last-child {
                    border-bottom: none;
                }

                ul.list-unstyled.top_profiles.scroll-view li.media.event a.pull-left.border-aero.profile_thumb {
                    display: inline-block;
                    width: 50px;
                    height: 50px;
                    text-align: center;
                    border: 2px solid #5cb85c;
                    /* Warna border sesuaikan dengan kebutuhan */
                    border-radius: 50%;
                    /* Agar tampil seperti lingkaran */
                    line-height: 50px;
                    font-size: 24px;
                }

                ul.list-unstyled.top_profiles.scroll-view li.media.event div.media-body {
                    padding-left: 10px;
                }

                ul.list-unstyled.top_profiles.scroll-view li.media.event div.media-body a.title {
                    font-weight: bold;
                    color: #333;
                    /* Warna teks untuk nama */
                }

                ul.list-unstyled.top_profiles.scroll-view li.media.event div.media-body p {
                    margin-bottom: 5px;
                    font-size: 14px;
                    color: #777;
                    /* Warna teks untuk informasi tambahan */
                }

                ul.list-unstyled.top_profiles.scroll-view li.media.event div.media-body p small {
                    font-size: 12px;
                    color: #999;
                    /* Warna teks untuk alamat */
                }
            </style>
        @endpush
        @section('dashboard')
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                <div class="page-heading">
                    <h2 style=" font-family: 'Caveat', cursive;">Point Coffee</h2>
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
                                        <a href="{{ url('pelanggan') }}" class="text-decoration-none">
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
                                                        class="stats-icon green mb-2 d-flex justify-content-center align-items-start position-relative">
                                                        <i class="bi bi-currency-dollar position-absolute top-0"></i>
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
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Data Stok</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $count_stok }}</h6>
                                                </div>
                                            </div>
                                        </div>
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
                        </div>
                        <div class="row">
                            <div class="col-md-8"> <!-- Mengurangi lebar card menjadi 8 kolom -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="p-6 m-20 bg-white rounded shadow">
                                            {!! $chart->container() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            @endsection

            @push('script')
                <script src="{{ $chart->cdn() }}"></script>

                {{ $chart->script() }}
            @endpush
