<style>
    /* Tabel */
    #tbl-category {
        background-color: #f8f9fa;
        /* Warna latar belakang */
        border-color: #000000;
        /* Warna garis tepi */
    }

    /* Warna latar belakang baris ganjil */
    #tbl-category tbody tr:nth-child(odd) {
        background-color: #ffffff;
        /* Warna latar belakang untuk baris ganjil */
    }

    /* Warna latar belakang baris genap */
    #tbl-category tbody tr:nth-child(even) {
        background-color: #f0f0f0;
        /* Warna latar belakang untuk baris genap */
    }

    /* Warna teks pada header tabel */
    #tbl-category thead th {
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

<table id="tbl-category" class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Category</th>
            <th class="text-center pe-0">Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->name }}</td>
                <td class="text-center">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#modalFormCategory" data-mode="edit"
                        data-id="{{ $p->id }}" data-name="{{ $p->name }}">
                        <i class="bi bi-pencil-fill text-success"></i>
                    </button>
                    <form method="post" action="{{ route('category.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-data" data-nama-produk="{{ $p->nama_produk }}">
                            <i class="bi bi-trash-fill text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
