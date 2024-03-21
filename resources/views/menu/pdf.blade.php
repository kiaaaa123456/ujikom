<table id="tbl-menu" class="table table-stripped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Jenis</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Image</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_jenis }}</td>
                <td>{{ $p->nama_menu }}</td>
                <td>{{ $p->harga }}</td>
                <td>{{ $p->image }}</td>
                <td>{{ $p->deskripsi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    /* Style untuk header tabel */
    #tbl-menu thead {
        background-color: #f2f2f2;
    }

    #tbl-menu th {
        padding: 8px;
        text-align: left;
    }

    /* Style untuk baris tabel */
    #tbl-menu td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    /* Style untuk nomor urutan */
    #tbl-menu td:first-child {
        width: 30px;
    }

    /* Style untuk nomor urutan di tengah */
    #tbl-menu td:first-child {
        text-align: center;
    }

    /* Style untuk baris ganjil */
    #tbl-menu tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    /* Style untuk baris genap */
    #tbl-menu tbody tr:nth-child(even) {
        background-color: #fff;
    }

    /* Style untuk tabel secara keseluruhan */
    #tbl-menu {
        border-collapse: collapse;
        width: 100%;
    }
</style>
