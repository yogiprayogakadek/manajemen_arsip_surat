<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Klasifikasi Surat
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
                    <label for="klasifikasi">Nama Klasifikasi</label>
                    <input type="text" class="form-control klasifikasi" name="klasifikasi" id="klasifikasi" placeholder="masukkan nama klasifikasi">
                    <div class="invalid-feedback error-klasifikasi"></div>
                </div>
                <div class="form-group">
                    <label for="nomor">Nomor Klasifikasi</label>
                    <input type="text" class="form-control nomor" name="nomor" id="nomor" placeholder="masukkan nomor klasifikasi">
                    <div class="invalid-feedback error-nomor"></div>
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