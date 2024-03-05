<style>
    /* Tabel */
    #tbl-pelanggan {
        background-color: #f8f9fa;
        /* Warna latar belakang */
        border-color: #000000;
        /* Warna garis tepi */
    }

    /* Warna latar belakang baris ganjil */
    #tbl-pelanggan tbody tr:nth-child(odd) {
        background-color: #ffffff;
        /* Warna latar belakang untuk baris ganjil */
    }

    /* Warna latar belakang baris genap */
    #tbl-pelanggan tbody tr:nth-child(even) {
        background-color: #f0f0f0;
        /* Warna latar belakang untuk baris genap */
    }

    /* Warna teks pada header tabel */
    #tbl-pelanggan thead th {
        color: #030303;
        background-color: #f5f53c;
    }

    /* Gaya tombol Edit */
    .edit-btn {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }
</style>

<table id="tbl-pelanggan" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Tlp</th>
            <th>Email</th>
            <th class="text-center pe-0">Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->email }}</td>
                <td class="text-center">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan" data-mode="edit"
                        data-id="{{ $p->id }}" 
                        data-nama="{{ $p->nama }}" data-alamat="{{ $p->alamat }}"
                        data-no_telp="{{ $p->no_telp }}" data-email="{{ $p->email }}">
                        <i class="bi bi-pencil-fill text-success"></i>
                    </button>
                    <form method="post" action="{{ route('pelanggan.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-data" data-nama="{{ $p->nama }}">
                            <i class="bi bi-trash-fill text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
