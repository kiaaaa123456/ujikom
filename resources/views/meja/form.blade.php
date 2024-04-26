<div class="modal fade" id="modalFormMeja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="meja">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">No Meja</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nomor_meja" value="" name="nomor_meja">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kapasitas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kapasitas" value="" name="kapasitas">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-select">
                                {{-- <option value="">Status</option> --}}
                                <option value="Kosong">Kosong</option>
                                <option value="Reservasi">Reservasi</option>
                            </select>
                            {{-- <select class="form-select" name="jenis_id" id="jenis_id">
                                <option value="">- Pilih -</option>
                                @foreach ($jenis as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_jenis }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
