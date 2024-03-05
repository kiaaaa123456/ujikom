<table id="tbl-jenis" class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Nama Supplier</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Keterangan</th>
            <th class="text-center pe-0">Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_suplier }}</td>
                <td>{{ $p->harga_beli }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td class="editable" data-id="{{ $p->id }}" contenteditable="true">{{ $p->stok }}</td>
                <td>{{ $p->keterangan }}</td>
                <td class="text-center">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#modalFormProduct" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}"
                        data-nama_suplier="{{ $p->nama_suplier }}" data-harga_beli="{{ $p->harga_beli }}"
                        data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->stok }}"
                        data-keterangan="{{ $p->keterangan }}">
                        <i class="bi bi-pencil-fill text-success"></i>
                    </button>
                    <form method="post" action="{{ route('produk-titipan.destroy', $p->id) }}"
                        style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete-data" data-nama_jenis="{{ $p->nama_produk }}">
                            <i class="bi bi-trash-fill text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mendapatkan semua elemen dengan kelas "editable"
            var editableCells = document.querySelectorAll('.editable');

            // Menambahkan event listener untuk setiap sel yang dapat diedit
            editableCells.forEach(function(cell) {
                cell.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault(); // Prevent default form submission behavior

                        // Mendapatkan nilai stok yang baru
                        var newStok = parseInt(this.innerText.trim());
                        var productId = this.getAttribute('data-id');

                        // Memeriksa apakah nilai stok adalah angka yang valid dan lebih besar dari nol
                        if (!isNaN(newStok) && newStok > 0) {
                            // Memanggil fungsi untuk menyimpan perubahan ke server
                            updateStok(productId, newStok);
                        } else {
                            console.error('Nilai stok tidak valid');
                        }
                    }
                });
            });

            function updateStok(productId, newStok) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/produk-titipan/' + productId + '/update-stok', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        window.location.reload();
                    } else {
                        console.error('Gagal memperbarui stok');
                    }
                };
                xhr.onerror = function() {
                    console.error('Terjadi kesalahan saat melakukan permintaan');
                };
                xhr.send('stok=' + newStok); // Mengirimkan data stok langsung tanpa parameter _method
            }
        });
    </script>
@endpush
