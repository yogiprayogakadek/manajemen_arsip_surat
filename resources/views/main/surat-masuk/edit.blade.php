<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Surat Masuk
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
                    <label for="pengirim" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Pengirim:
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control pengirim" id="pengirim" name="pengirim" value="{{$surat->pengirim}}">
                        <div class="invalid-feedback error-pengirim"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pengirim" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Klasifikasi Surat:
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="klasifikasi" id="klasifikasi" class="form-control klasifikasi">
                            <option value="">Pilih klasifikasi...</option>
                            @foreach ($klasifikasi as $klas)
                                <option value="{{$klas->id}}" {{$surat->klasifikasi_id == $klas->id ? 'selected' : ''}}>{{$klas->klasifikasi}} || {{$klas->nomor}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-klasifikasi"></div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="kategori" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Kategori Surat:
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="kategori" id="kategori" class="form-control kategori">
                            <option value="">Pilih kategori...</option>
                            @foreach ($kategori as $kat)
                                <option value="{{$kat}}" {{$surat->kategori == $kat ? 'selected' : ''}}>{{$kat}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-kategori"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nomor-surat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        No. Surat:
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nomor_surat" id="nomor-surat" name="nomor_surat" value="{{$surat->nomor_surat}}">
                        <div class="invalid-feedback error-nomor_surat"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="perihal" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Perihal:
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control perihal" id="perihal" name="perihal" value="{{$surat->perihal}}">
                        <div class="invalid-feedback error-perihal"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tembusan" class="ul-form__label ul-form--margin col-lg-1 col-form-label ">
                        Tembusan:
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11">
                        <select name="tembusan[]" id="tembusan" class="form-control tembusan select-dropdown" multiple="multiple">
                            @foreach ($dinas as $key => $value)
                                <option value="{{$key}}|{{$value}}" {{in_array($key.'|'.$value, $tembusan) ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                        {{-- <div class="invalid-feedback error-tembusan"></div> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="perihal" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tembusan Khusus:
                        {{-- <br> <span class="label-needed">(Dibutuhkan)</span> --}}
                    </label>
                    <div class="col-lg-11 mt-2">
                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tembusan_khusus[]" value="bupati" id="tembusan_khusus" {{in_array('bupati', $tembusan_explode) ? 'checked' : ''}}>
                            <span>Bupati</span>
                            <span class="checkmark"></span>
                        </label>

                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="tembusan_khusus[]" value="wakil_bupati" id="tembusan_khusus" {{in_array('wakil_bupati', $tembusan_explode) ? 'checked' : ''}}>
                            <span>Wakil Bupati</span>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal-surat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tanggal Surat:
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
                            <input type="date" class="form-control tanggal_surat" id="tanggal-surat" name="tanggal_surat" value="{{$surat->tanggal_surat}}">
                        </div>
                        <div class="invalid-feedback error-tanggal_surat"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        File Surat:
                        <br> <span class="label-needed pointer btn-surat" data-surat="{{$surat->file_surat}}">(lihat file sebelumnya)</span>
                    </label>
                    <div class="col-lg-11">
                        <input type="file" class="form-control file_surat" id="file-surat" name="file_surat">
                        <small id="passwordHelpBlock" class="ul-form__text form-text">kosongkan jika tidak ingin mengunggah file surat</small>
                        <div class="invalid-feedback error-file_surat"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        File Lampiran:
                        <br> <span class="label-needed pointer btn-lampiran-view" data-id="{{$surat->id}}">(lihat file sebelumnya)</span>
                    </label>
                    <div class="col-lg-11 lampiran-group">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control file-lampiran" id="file-lampiran" name="file_lampiran[]">
                            <div class="input-group-append">
                                <span class="input-group-text bg-success text-white pointer btn-lampiran" id="basic-addon2">
                                    <i class="fa fa-plus"></i> Tambah
                                </span>
                            </div>
                        </div>
                        <div class="invalid-feedback error-file_lampiran"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="unit-kerja" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Unit Kerja Pemegang Dokumen Fisik:
                        <br> <span class="label-needed">(Dibutuhkan)</span>
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select name="unit_kerja" id="unit-kerja" class="form-control unit_kerja">
                            <option value="">Pilih unit kerja...</option>
                            @foreach ($unit as $key => $value)
                                <option value="{{$key}}" {{$surat->unit_kerja_id == $key ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-unit_kerja"></div>
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

<!-- Modal -->
<div class="modal fade" id="modalLampiran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Lampiran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="tableLampiran">
                    <thead>
                        <tr>
                            <th width="3%">No.</th>
                            <th>Lampiran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.select-dropdown').select2({ width: '100%' });
    });
</script>