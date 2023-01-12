<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Pengajuan
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div class="m-auto"></div>
                        <button type="button" class="btn btn-outline-primary btn-data">
                            <i class="nav-icon i-Pen-2 font-weight-bold"></i> Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control kode" name="kode" id="kode" placeholder="masukkan kode">
                    <div class="invalid-feedback error-kode"></div>
                </div>
                <div class="form-group">
                    <label for="unit-pengolahan">Unit Pengolahan</label>
                    <input type="text" class="form-control unit_pengolahan" name="unit_pengolahan" id="unit-pengolahan" placeholder="masukkan unit pengolahan">
                    <div class="invalid-feedback error-unit_pengolahan"></div>
                </div>
                <div class="form-group">
                    <label for="tanggal-surat">Tanggal Surat</label>
                    <input type="date" class="form-control tanggal_surat" name="tanggal_surat" id="tanggal-surat">
                    <div class="invalid-feedback error-tanggal_surat"></div>
                </div>
                <div class="form-group">
                    <label for="uraian-perihal">Uraian Perihal</label>
                    <textarea name="uraian_perihal" id="uraian-perihal" class="form-control uraian_perihal" rows="7"></textarea>
                    <div class="invalid-feedback error-uraian_perihal"></div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control keterangan" name="keterangan" id="keterangan" placeholder="masukkan keterangan">
                    <div class="invalid-feedback error-keterangan"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-save">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary m-1 btn-data">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>