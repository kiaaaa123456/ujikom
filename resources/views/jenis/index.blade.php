@extends('template.layout')

@push('style')
@endpush
@section('content')
    <div id="main" class='layout-navbar'>
        <header class='mb-3'>
            <nav class="navbar navbar-expand navbar-light navbar-top">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3 style=" font-family: 'Caveat', cursive;"> P O I N T COFFEE</h3>
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
                                <h4 class="card-title">Data Jenis</h4>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalFormJenis">
                            <i class="bi bi-plus"></i>Tambah
                        </button>
                        <a href="{{ url('pdfjenis') }}" target="_blank" class="btn btn-danger">
                            <i class="bi bi-file-pdf"></i>PDF
                        </a>
                        <a href="{{ route('exportjenis') }}" class="btn btn-success">
                            <i class="bi bi-file-excel"></i>Export
                        </a>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formImport">
                            <i class="bi bi-cloud-upload"></i>Import
                        </button>

                        <div class="mt-3">
                            @include('jenis.data')
                        </div>
                    </div>
                </div>
                @include('jenis.form')
            </section>
        @endsection

        @push('script')
            <script>
                $('#tbl-jenis').DataTable()
                $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
                    $('.alert-success').slideUp(500)
                })
                $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
                    $('.alert-danger').slideUp(500)
                })
                console.log($('.delete-data'))
                $('.delete-data').on('click', function(e) {
                    e.preventDefault()
                    const data = $(this).closest('tr').find('td:eq(1)').text()
                    Swal.fire({
                        title: `Apakah data <span style="color:red">${data}</span> akan dihapus?`,
                        text: "Data tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus data ini!'
                    }).then((result) => {
                        if (result.isConfirmed)
                            $(e.target).closest('form').submit()
                        else swal.close()
                    })
                })
                $('#modalFormJenis').on('show.bs.modal', function(e) {
                    const btn = $(e.relatedTarget)
                    console.log(btn.data('mode'))
                    const mode = btn.data('mode')
                    const nama_jenis = btn.data('nama_jenis')
                    const id = btn.data('id')
                    const modal = $(this)
                    // console.log($(this))
                    if (mode === 'edit') {
                        modal.find('.modal-title').text('Edit Data jenis')
                        modal.find('#nama_jenis').val(nama_jenis)
                        modal.find('.modal-body form').attr('action', '{{ url('jenis') }}/' + id)
                        modal.find('#method').html('@method('PATCH')')
                    } else {
                        modal.find('.modal-title').text('Input Data jenis')
                        modal.find('#nama_jenis').val('')
                        modal.find('#method').html('')
                        modal.find('.modal-body form').attr('action', '{{ url('jenis') }}')
                    }
                })
            </script>
        @endpush
