<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Surat Keluar
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
                <input type="hidden" name="id" id="id" value="{{$surat->id}}">
                <div class="form-group row">
                    <label for="klasifikasi" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Klasifikasi Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="klasifikasi" id="klasifikasi" class="form-control klasifikasi">
                            <option value="">Pilih klasifikasi...</option>
                            @foreach ($klasifikasi as $klas)
                                <option value="{{$klas->id}}" {{$klas->id == $surat->klasifikasi_id ? 'selected' : ''}}>{{$klas->klasifikasi}} || {{$klas->nomor}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-klasifikasi"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipe" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tipe Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="tipe" id="tipe" class="form-control tipe">
                            <option value="">Pilih tipe...</option>
                            @foreach ($tipe as $tipe)
                                <option value="{{$tipe->id}}" {{$tipe->id == $surat->tipe_id ? 'selected' : ''}}>{{$tipe->tipe}} || {{$tipe->nomor}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-tipe"></div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="kategori" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Kategori Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="kategori" id="kategori" class="form-control kategori">
                            <option value="">Pilih kategori...</option>
                            @foreach ($kategori as $kat)
                                <option value="{{$kat}}" {{$kat == $surat->kategori ? 'selected' : ''}}>{{$kat}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-kategori"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="perihal" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Perihal
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control perihal" id="perihal" name="perihal" value="{{$surat->perihal}}">
                        <div class="invalid-feedback error-perihal"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal-surat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tanggal Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                            </div>
                            {{-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> --}}
                            <input type="date" class="form-control tanggal_surat" id="tanggal-surat" name="tanggal_surat" value="{{$surat->tanggal_surat}}" readonly>
                        </div>
                        <div class="invalid-feedback error-tanggal_surat"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="catatan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Catatan Pengingat
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control catatan" id="catatan" name="catatan" rows="5">{{$surat->catatan_pengingat}}</textarea>
                        <small id="passwordHelpBlock" class="ul-form__text form-text"><i>Hanya tampil di pengirim surat</i></small>
                        <div class="invalid-feedback error-catatan"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tujuan-surat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tujuan Surat
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 mt-2">
                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tujuan_surat[]" value="Internal Pemerintahan Badung" id="tujuan-surat" class="internal" {{in_array('Internal Pemerintahan Badung', json_decode($surat->tujuan_surat, true)) ? 'checked' : ''}}>
                            <span>Internal Pemerintahan Badung</span>
                            <span class="checkmark"></span>
                        </label>

                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tujuan_surat[]" value="Luar Pemerintahan Badung" id="tujuan-surat" class="eksternal" {{in_array('Luar Pemerintahan Badung', json_decode($surat->tujuan_surat, true)) ? 'checked' : ''}}>
                            <span>Luar Pemerintahan Badung</span>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

                <div class="form-group row div-tujuan" hidden>
                    <label for="tujuan" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tujuan
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11">
                        <select name="tujuan[]" id="tujuan" class="form-control tujuan select-dropdown" multiple="multiple">
                            @foreach ($dinas as $key => $value)
                                <option value="{{$key}}|{{$value}}" {{in_array($key, array_column(json_decode($surat->tujuan, true), 'dinas_id')) ?  'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-tujuan"></div>
                    </div>
                </div>

                <div class="form-group row div-tujuan-keluar" hidden>
                    <label for="tujuan-keluar" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tujuan Keluar
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 tujuan-keluar-group">
                        @foreach (json_decode($surat->tujuan_keluar, true) as $key => $value)
                            <div class="input-group mb-3">
                                <input type="text" class="form-control tujuan_keluar" data-id="{{$key+1}}" id="tujuan-keluar-{{$key+1}}" name="tujuan_keluar[]" value="{{$value}}">
                                <div class="input-group-append">
                                    <span class="input-group-text {{$key == 0 ? 'bg-success' : 'bg-danger'}} text-white pointer {{$key == 0 ? 'btn-tujuan' : 'btn-tujuan-delete'}}" id="basic-addon2">
                                        <i class="{{$key == 0 ? 'fa fa-plus' : 'fa fa-trash'}}"></i> {{$key == 0 ? 'Tambah' : 'Hapus'}}
                                    </span>
                                </div>
                                <div class="invalid-feedback error-tujuan_keluar_{{$key+1}}"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tembusan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tembusan
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 mt-2">
                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tembusan[]" value="bupati" id="tembusan" {{in_array('bupati', $tembusan) ? 'checked' : ''}}>
                            <span>Bupati</span>
                            <span class="checkmark"></span>
                        </label>

                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tembusan[]" value="wakil_bupati" id="tembusan" {{in_array('wakil_bupati', $tembusan) ? 'checked' : ''}}>
                            <span>Wakil Bupati</span>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="temmbusan-dinas" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tembusan Dinas
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11">
                        <select name="tembusan_dinas[]" id="tembusan-dinas" class="form-control tembusan-dinas select-dropdown" multiple="multiple">
                            @foreach ($dinas as $index => $val)
                                <option value="{{$index}}|{{$val}}" {{in_array($index, array_column(json_decode($surat->tembusan_dinas, true), 'dinas_id')) ?  'selected' : ''}}>{{$val}}</option>
                            @endforeach
                        </select>
                        {{-- <div class="invalid-feedback error-tembusan"></div> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tembusan-keluar" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tembusan Keluar
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 tembusan-keluar-group">

                        @foreach (json_decode($surat->tembusan_keluar, true) as $key => $value)
                            <div class="input-group mb-3">
                                <input type="text" class="form-control tembusan_keluar" id="tembusan-keluar" name="tembusan_keluar[]" value="{{$value}}">
                                <div class="input-group-append">
                                    <span class="input-group-text {{$key == 0 ? 'bg-success' : 'bg-danger'}} text-white pointer {{$key == 0 ? 'btn-tembusan' : 'btn-tembusan-delete'}}" id="basic-addon2">
                                        <i class="{{$key == 0 ? 'fa fa-plus' : 'fa fa-trash'}}"></i> {{$key == 0 ? 'Tambah' : 'Hapus'}}
                                    </span>
                                </div>
                                <div class="invalid-feedback error-error-tembusan_keluar"></div>
                            </div>
                        @endforeach
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

<script>
    $(document).ready(function () {
        $('.select-dropdown').select2({ width: '100%' });
    });
</script>
