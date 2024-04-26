<table id="tbl-absensi" class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>Tanggal Masuk</th>
            <th>Waktu Masuk</th>
            <th>Status</th>
            <th>Waktu Selesai</th>
            <th class="text-center pe-0">Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absensi as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_karyawan }}</td>
                <td>{{ $p->tanggal_masuk }}</td>
                <td>{{ $p->waktu_masuk }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    @php
                        // Pisahkan jam dan menit dari waktu keluar
                        $jamKeluar = explode(':', $p->waktu_selesai)[0];
                        $menitKeluar = explode(':', $p->waktu_selesai)[1];

                        // A;bil jam saat ini

                        $jamSaatIni = (float) (date('H') + 7 . '.' . date('i'));
                        $jamSaatKeluarAh = (float) ($jamKeluar . '.' . $menitKeluar);

                        // dd($jamSaatIni, $jamSaatKeluarah);
                        // Jika jam keluar sama dengan jam saat ini, tampilkan "Selesai"
                        // Jika tidak, tampilkan waktu keluar
                        if ($jamSaatKeluarAh <= $jamSaatIni) {
                            echo 'Selesai';
                        } else {
                            echo $p->waktu_selesai;
                        }
                    @endphp
                </td>
                <td class="text-center">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#modalFormAbsensi" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_karyawan="{{ $p->nama_karyawan }}"
                        data-tanggal_masuk="{{ $p->tanggal_masuk }}"data-waktu_masuk="{{ $p->waktu_masuk }}"
                        data-status="{{ $p->status }}" data-waktu_selesai="{{ $p->waktu_selesai }}">
                        <i class="bi bi-pencil-fill text-success"></i>
                    </button>
                    <form method="post" action="{{ route('absensi.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-data" data-nama_karyawan="{{ $p->nama_karyawan }}">
                            <i class="bi bi-trash-fill text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Pindahkan skrip JavaScript ke bagian bawah halaman atau masukkan ke dalam file JavaScript terpisah -->
{{-- <script>
    function tampilkanWaktu(id) {
        // Mendapatkan tombol menggunakan jQuery dengan ID yang sesuai
        var tombol = $("#btnSelesai_" + id);

        // Membuat string waktu saat ini
        var waktuSekarang = new Date();
        var waktuString = waktuSekarang.toISOString().slice(0, 19).replace('T', ' ');

        // Dapatkan token CSRF dari meta tag
        var token = $('meta[name="csrf-token"]').attr('content');

        // Kirim waktu ke server menggunakan jQuery Ajax
        $.ajax({
            url: "/simpan-waktu",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {
                id: id,
                waktu: waktuString
            },
            success: function(response) {
                // Perbarui teks tombol dengan waktu yang diterima dari server
                tombol.text(response.waktu);
            },
            error: function(xhr, status, error) {
                console.error(xhr, error);
            }
        });
    }
</script> --}}
