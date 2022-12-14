<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Unit Kerja
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
            <table class="table table-hover" id="tableData">
                <thead>
                    <th>No</th>
                    <th>No. Surat</th>
                    <th>Pengirim</th>
                    <th>Klasifikasi</th>
                    <th>Kategori</th>
                    <th>Tanggal Surat</th>
                    {{-- @can('admin') --}}
                    <th>Aksi</th>
                    {{-- @endcan --}}
                </thead>
                <tbody>
                    @foreach ($surat as $surat)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$surat->nomor_surat}}</td>
                        <td>{{$surat->pengirim}}</td>
                        <td>{{$surat->klasifikasi->klasifikasi}}</td>
                        <td>{{$surat->kategori}}</td>
                        <td>{{$surat->tanggal_surat}}</td>
                        <td>
                            <button class="btn btn-edit btn-default" data-id="{{$surat->id}}">
                                <i class="fa fa-eye text-success mr-2 pointer" ></i> Edit
                            </button>
                        </td>
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