<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Tipe Surat
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
                <input type="hidden" name="id" id="id" value="{{$tipe->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tipe">Nama tipe</label>
                        <input type="text" class="form-control tipe" value="{{$tipe->tipe}}" name="tipe" id="tipe" placeholder="masukkan nama tipe surat">
                        <div class="invalid-feedback error-tipe"></div>
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor Tipe Surat</label>
                        <input type="text" class="form-control nomor" value="{{$tipe->nomor}}" name="nomor" id="nomor" placeholder="masukkan nomor tipe surat">
                        <div class="invalid-feedback error-nomor"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-update">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary m-1 btn-data">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>