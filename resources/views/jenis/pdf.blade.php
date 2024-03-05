<table id="tbl-jenis" class="table table-stripped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Jenis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenis as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_jenis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    /* Style untuk header tabel */
    #tbl-jenis thead {
        background-color: #f2f2f2;
    }

    #tbl-jenis th {
        padding: 8px;
        text-align: left;
    }

    /* Style untuk baris tabel */
    #tbl-jenis td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    /* Style untuk nomor urutan */
    #tbl-jenis td:first-child {
        width: 30px;
    }

    /* Style untuk nomor urutan di tengah */
    #tbl-jenis td:first-child {
        text-align: center;
    }

    /* Style untuk baris ganjil */
    #tbl-jenis tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    /* Style untuk baris genap */
    #tbl-jenis tbody tr:nth-child(even) {
        background-color: #fff;
    }

    /* Style untuk tabel secara keseluruhan */
    #tbl-jenis {
        border-collapse: collapse;
        width: 100%;
    }
</style>
