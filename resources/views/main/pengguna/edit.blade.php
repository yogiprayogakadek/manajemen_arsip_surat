<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Dinas
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
                <input type="hidden" name="id" id="id" value="{{$pengajuan->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama" value="{{$pengguna->nama}}">
                        <div class="invalid-feedback error-nama"></div>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="text" class="form-control telp" name="telp" id="telp" placeholder="masukkan telp" value="{{$pengguna->telp}}">
                        <div class="invalid-feedback error-telp"></div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control username" name="username" id="username" placeholder="masukkan username"  value="{{$pengguna->username}}">
                        <div class="invalid-feedback error-username"></div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control password" name="password" id="password" placeholder="masukkan password">
                        <div class="invalid-feedback error-password"></div>
                    </div> --}}
                    <div class="form-group">
                        <label for="upt">UPT</label>
                        <input type="text" class="form-control upt" name="upt" id="upt" placeholder="masukkan upt"  value="{{$pengguna->role}}">
                        <div class="invalid-feedback error-upt"></div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control foto" name="foto" id="foto" placeholder="masukkan foto">
                        <span class="text-small text-muted">*kosongkan bila tidak ada foto</span>
                        <div class="invalid-feedback error-foto"></div>
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