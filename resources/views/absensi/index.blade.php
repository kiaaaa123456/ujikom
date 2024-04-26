{{-- @extends('template.layout')

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
                                </li>
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
                        <h3>ABSENSI KERJA KARYAWAN</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h4 class="card-title">Data Absensi</h4>
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
                            data-bs-target="#modalFormAbsensi">
                            <i class="bi bi-plus"></i>Tambah
                        </button>
                        <a href="{{ url('pdfabsensi') }}" target="_blank" class="btn btn-danger">
                            <i class="bi bi-file-pdf"></i>PDF
                        </a>
                        <a href="{{ route('exportabsensi') }}" class="btn btn-success">
                            <i class="bi bi-file-excel"></i>Export
                        </a>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formImport">
                            <i class="bi bi-cloud-upload"></i>Import
                        </button>
                        <a href="{{ route('unduhabsensi') }}" class="btn btn-success">
                            <i class="bi bi-file-excel"></i>Unduh Format
                        </a>
                        <div class="mt-3">
                            @include('absensi.data')
                        </div>
                    </div>
                </div>
                @include('absensi.form')
            </section>
        @endsection

        @push('script')
            <script>
                $('#tbl-absensi').DataTable()
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
                $('#modalFormAbsensi').on('show.bs.modal', function(e) {
                    const btn = $(e.relatedTarget)
                    console.log(btn.data('mode'))
                    const mode = btn.data('mode')
                    const nama_karyawan = btn.data('nama_karyawan')
                    const tanggal_masuk = btn.data('tanggal_masuk')
                    const waktu_masuk = btn.data('waktu_masuk')
                    const status = btn.data('status')
                    const waktu_selesai = btn.data('waktu_selesai')
                    const id = btn.data('id')
                    const modal = $(this)
                    // console.log($(this))
                    if (mode === 'edit') {
                        modal.find('.modal-title').text('Edit Data Absensi')
                        modal.find('#nama_karyawan').val(nama_karyawan)
                        modal.find('#tanggal_masuk').val(tanggal_masuk)
                        modal.find('#waktu_masuk').val(waktu_masuk)
                        modal.find('#status').val(status)
                        modal.find('#waktu_selesai').val(waktu_selesai)
                        modal.find('.modal-body form').attr('action', '{{ url('absensi') }}/' + id)
                        modal.find('#method').html('@method('PATCH')')
                        console.log(name)
                    } else {
                        modal.find('.modal-title').text('Input Data Absensi')
                        modal.find('#nama_karyawan').val('')
                        modal.find('#tanggal_masuk').val('')
                        modal.find('#waktu_masuk').val('')
                        modal.find('#status').val('')
                        modal.find('#waktu_selesai').val('')
                        modal.find('#method').html('')
                        modal.find('.modal-body form').attr('action', '{{ url('absensi') }}')
                    }
                })
                $(document).ready(function() {
                    $('#tbl-absensi tbody').on('dblclick', 'td', function() {
                        var column_num = parseInt($(this).index()) + 1;
                        var row_num = parseInt($(this).closest('tr').find('button[data-mode=edit]').data('id'));
                        console.log(row_num)
                        var col_name = $(this).closest('table').find('th').eq(column_num - 1).text();
                        if (col_name === 'Status') {
                            var current_data = $(this).text();
                            $(this).html('<select class="form-control select-status" data-id="' + row_num + '">' +
                                '<option value="Masuk">Masuk</option>' +
                                '<option value="Izin">Izin</option>' +
                                '<option value="Sakit">Sakit</option>' +
                                '<option value="Cuti">Cuti</option>' +
                                '</select>');
                            $(this).find('.select-status').val(current_data);

                        }
                    });

                    $('#tbl-absensi tbody').on('change', '.select-status', function() {
                        var new_status = $(this).val();
                        var row_num = $(this).data('id');
                        var valid_statuses = ['Masuk', 'Izin', 'Sakit', 'Cuti']; // Daftar status yang valid

                        if (!valid_statuses.includes(new_status)) {
                            var confirm_custom_status = confirm(
                                'Status tidak valid. Apakah Anda ingin menggunakan status kustom?');
                            if (confirm_custom_status) {
                                var input_status = prompt('Masukkan status baru:');
                                if (input_status !== null && input_status.trim() !== '') {
                                    new_status = input_status.trim();
                                } else {
                                    $(this).val($(this).data(
                                        'prev-status'
                                    )); // Kembalikan ke status sebelumnya jika status kustom tidak valid
                                    return;
                                }
                            } else {
                                $(this).val($(this).data(
                                    'prev-status'
                                )); // Kembalikan ke status sebelumnya jika tidak ingin menggunakan status kustom
                                return;
                            }
                        }

                        // Send the new status to the backend using AJAX
                        $.ajax({
                            type: "POST",
                            url: "update-status",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                row_num: row_num,
                                new_status: new_status
                            },
                            success: function(response) {
                                // Handle the response
                                console.log(response);
                            },
                            error: function(error) {
                                // Handle the error
                                console.log(error);
                            }
                        });

                        $(this).parent().text(new_status);
                    });


                });
            </script>
        @endpush --}}
