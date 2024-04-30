@extends('tamplate.layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Hari Ini</h5>

                    <div class="d-flex justify-content-between gap-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('menu') }}" class="text-decoration-none"><span>Data Menu</span></a>
                                <h3 class="card-title mb-2">{{ $count_menu }}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('stok') }}" class="text-decoration-none"><span>Data Stok</span></a>
                                <h3 class="card-title mb-2">{{ $count_stok }}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="text-decoration-none"><span>Pendapatan</span></a>
                                <h3 class="card-title mb-2">{{ $pendapatan }}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="card-body">
                                <a href="{{ url('transaksi') }}" class="text-decoration-none"><span> Jumlah Transaksi</span></a>
                                <h3 class="card-title mb-2">{{ $count_transaksi }}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Top 5 Penjualan</h4>
            </div>
            <div class="card-content pb-3">
                <div class="count">
                    @foreach ($most_ordered_menu as $menu => $count)
                        @php
                            // Temukan objek menu sesuai dengan nama_menu
                            $menuObject = \App\Models\Menu::where('nama_menu', $menu)->first();
                        @endphp
                        @if ($menuObject)
                            <div class="d-flex align-items-center mb-3">
                                <!-- Gunakan URL yang sesuai untuk mengakses gambar -->
                                <img src="{{ asset('images/' . $menuObject->image) }}" alt="{{ $menuObject->nama_menu }}"
                                    class="mr-3" style="width: 70px; height: 70px;">
                                <div>
                                    <p class="mb-1">{{ $menuObject->nama_menu }}</p>
                                    <p class="mb-0"><strong>{{ $count }}</strong> terjual</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Letakkan skrip JavaScript Anda di sini -->
@endpush
