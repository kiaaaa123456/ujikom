@extends('template.layout')

@push('style')
@endpush
@section('content')
    <div id="main" class='layout-navbar'>
        <header class='mb-3'>
            <nav class="navbar navbar-expand navbar-light navbar-top">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-lg-0">
                        </ul>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">D I N O</h6>
                                        <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="{{ asset('mazer') }}/assets/images/faces/1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                style="min-width: 11rem;">
                                <li>
                                    <h6 class="dropdown-header">Hello, Sann!</h6>
                                </li>
                                <hr class="dropdown-divider">
                                <li>
                                    <a class="dropdown-item" href="#"><i
                                            class="icon-mid bi bi-box-arrow-left me-2"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div id="main-content">
            <a href="{{ url('pdflaporan') }}" target="_blank" class="btn btn-danger">
                <i class="bi bi-file-pdf"></i>PDF
            </a>
            <a href="{{ route('exportlaporan') }}" class="btn btn-success">
                <i class="bi bi-file-excel"></i>Export
            </a>
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center">LAPORAN</h4>
                            </div>

                        </div>
                    </div>
                    <form action="/laporan" method="POST">
                        @csrf
                        <div class="card-body">
                            <span style="display: inline-flex; align-items: center;">
                                <input type="date" class="form-control" id="tanggal_awal" value="" name="tanggal_awal"
                                    style="width: 150px;">
                            </span>
                            <span style="margin-left: 30px;">s/d</span>
                            <span style="display: inline-flex; align-items: center;">
                                <input type="date" class="form-control" id="tanggal_akhir" value="" name="tanggal_akhir"
                                    style="width: 150px; margin-left: 35px;">
                            </span>
                            <button type="submit" class="btn btn-danger" style="margin-left: 10px;">
                                <i class="bi bi-search"></i>
                            </button>

                    </form>

                    <div class="mt-3">
                        @include('laporan.data')
                    </div>
                </div>
        </div>
        {{-- @include('jenis.form') --}}
        </section>
    @endsection
    @push('script')
        <script>
            $('#tbl-laporan').DataTable()
        </script>
    @endpush
