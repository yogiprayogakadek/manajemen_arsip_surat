<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pengajuan
                </div>
                {{-- @can('admin') --}}
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
                    <button type="button" class="btn btn-outline-primary btn-add">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i> Tambah
                    </button>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Unit Pengolaha</th>
                    <th>Tanggal Surat</th>
                    <th>Urain Perihal</th>
                    <th>Penanggung Jawab</th>
                    <th>Status</th>
                    <th>Nomor Surat</th>
                    {{-- @can('admin') --}}
                    <th>Aksi</th>
                    {{-- @endcan --}}
                </thead>
                <tbody>
                    @foreach ($pengajuan as $pengajuan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pengajuan->kode}}</td>
                        <td>{{$pengajuan->unit_pengolahan}}</td>
                        <td>{{$pengajuan->tanggal_surat}}</td>
                        <td>{{$pengajuan->uraian_perihal}}</td>
                        <td>{{$pengajuan->keterangan}}</td>
                        <td>{{$pengajuan->status == true ? 'Sudah divalidasi' : 'Belum divalidasi'}}</td>
                        <td>{{$pengajuan->nomor_surat ?? '-'}}</td>
                        {{-- @can('admin')    --}}
                        <td>
                            <button class="btn btn-edit btn-default" data-id="{{$pengajuan->id}}">
                                <i class="fa fa-eye text-success mr-2 pointer"></i> Edit
                            </button>
                            <button class="btn btn-validasi {{$pengajuan->status == true ? 'btn-danger' : 'btn-info'}}" data-id="{{$pengajuan->id}}">
                                <i class="fa {{$pengajuan->status == true ? 'fa fa-ban' : 'fa-check-circle'}} text-success ml-2 pointer"></i> {{$pengajuan->status == true ? 'Batalkan' : 'Validasi'}}
                            </button>
                        </td>
                        {{-- @endcan --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#tableData').DataTable({
        language: {
            paginate: {
                previous: "Previous",
                next: "Next"
            },
            info: "Showing _START_ to _END_ from _TOTAL_ data",
            infoEmpty: "Showing 0 to 0 from 0 data",
            lengthMenu: "Showing _MENU_ data",
            search: "Search:",
            emptyTable: "Data doesn't exists",
            zeroRecords: "Data doesn't match",
            loadingRecords: "Loading..",
            processing: "Processing...",
            infoFiltered: "(filtered from _MAX_ total data)"
        },
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],
    });
</script>