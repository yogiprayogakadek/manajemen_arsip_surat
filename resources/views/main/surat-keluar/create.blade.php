<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Surat Keluar
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
                <div class="form-group row">
                    <label for="nomor-surat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nomor Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="nomor_surat" id="nomor-surat" class="form-control nomor_surat">
                            <option value="">Nomor surat...</option>
                            @foreach ($nomor_surat as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-nomor_surat"></div>
                    </div>
                </div>

                <div class="form-group row hidden">
                    <label for="klasifikasi" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Klasifikasi Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="klasifikasi" id="klasifikasi" class="form-control klasifikasi">
                            <option value="">Pilih klasifikasi...</option>
                            @foreach ($klasifikasi as $klas)
                                <option value="{{$klas->id}}">{{$klas->klasifikasi}} || {{$klas->nomor}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-klasifikasi"></div>
                    </div>
                </div>

                <div class="form-group row hidden">
                    <label for="tipe" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tipe Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="tipe" id="tipe" class="form-control tipe">
                            <option value="">Pilih tipe...</option>
                            @foreach ($tipe as $tipe)
                                <option value="{{$tipe->id}}">{{$tipe->tipe}} || {{$tipe->nomor}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-tipe"></div>
                    </div>
                </div>
                
                <div class="form-group row hidden">
                    <label for="kategori" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Kategori Surat
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="kategori" id="kategori" class="form-control kategori">
                            <option value="">Pilih kategori...</option>
                            @foreach ($kategori as $kat)
                                <option value="{{$kat}}">{{$kat}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-kategori"></div>
                    </div>
                </div>

                <div class="form-group row hidden">
                    <label for="perihal" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Perihal
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control perihal" id="perihal" name="perihal">
                        <div class="invalid-feedback error-perihal"></div>
                    </div>
                </div>

                <div class="form-group row hidden">
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
                            <input type="date" class="form-control tanggal_surat" id="tanggal-surat" name="tanggal_surat" value="{{date('Y-m-d')}}" readonly>
                        </div>
                        <div class="invalid-feedback error-tanggal_surat"></div>
                    </div>
                </div>

                <div class="form-group row hidden">
                    <label for="catatan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Catatan Pengingat
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control catatan" id="catatan" name="catatan" rows="5"></textarea>
                        <small id="passwordHelpBlock" class="ul-form__text form-text"><i>Hanya tampil di pengirim surat</i></small>
                        <div class="invalid-feedback error-catatan"></div>
                    </div>
                </div>

                <div class="form-group hidden row">
                    <label for="tujuan-surat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tujuan Surat
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 mt-2">
                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tujuan_surat[]" value="Internal Pemerintahan Badung" id="tujuan-surat" class="internal">
                            <span>Internal Pemerintahan Badung</span>
                            <span class="checkmark"></span>
                        </label>

                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tujuan_surat[]" value="Luar Pemerintahan Badung" id="tujuan-surat" class="eksternal">
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
                                <option value="{{$key}}|{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-tujuan"></div>
                    </div>
                </div>

                <div class="form-group row hidden div-tujuan-keluar" hidden>
                    <label for="tujuan-keluar" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tujuan Keluar
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 tujuan-keluar-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control tujuan_keluar" data-id="1" id="tujuan-keluar-1" name="tujuan_keluar[]">
                            <div class="input-group-append">
                                <span class="input-group-text bg-success text-white pointer btn-tujuan" id="basic-addon2">
                                    <i class="fa fa-plus"></i> Tambah
                                </span>
                            </div>
                            <div class="invalid-feedback error-tujuan_keluar_1"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group row hidden">
                    <label for="tembusan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tembusan
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 mt-2">
                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tembusan[]" value="bupati" id="tembusan">
                            <span>Bupati</span>
                            <span class="checkmark"></span>
                        </label>

                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tembusan[]" value="wakil_bupati" id="tembusan">
                            <span>Wakil Bupati</span>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

                <div class="form-group row hidden">
                    <label for="temmbusan-dinas" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tembusan Dinas
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11">
                        <select name="tembusan_dinas[]" id="tembusan-dinas" class="form-control tembusan-dinas select-dropdown" multiple="multiple">
                            @foreach ($dinas as $index => $val)
                                <option value="{{$index}}|{{$val}}">{{$val}}</option>
                            @endforeach
                        </select>
                        {{-- <div class="invalid-feedback error-tembusan"></div> --}}
                    </div>
                </div>

                <div class="form-group row hidden">
                    <label for="tembusan-keluar" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tembusan Keluar
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 tembusan-keluar-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control tembusan_keluar" id="tembusan-keluar" name="tembusan_keluar[]">
                            <div class="input-group-append">
                                <span class="input-group-text bg-success text-white pointer btn-tembusan" id="basic-addon2">
                                    <i class="fa fa-plus"></i> Tambah
                                </span>
                            </div>
                        </div>
                        <div class="invalid-feedback error-tembusan_keluar"></div>
                    </div>
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

<script>
    $(document).ready(function () {
        $('.select-dropdown').select2({ width: '100%' });
    });
</script>
