<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pengguna
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
                    <th>Nama</th>
                    <th>Unit</th>
                    <th>Foto</th>
                    {{-- @can('admin') --}}
                    <th>Aksi</th>
                    {{-- @endcan --}}
                </thead>
                <tbody>
                    @foreach ($pengguna as $pengguna)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pengguna->nama}}</td>
                        <td>{{$pengguna->role}}</td>
                        <td><img src="{{asset($pengguna->foto)}}" width="70px"></td>
                        {{-- @can('admin')    --}}
                        <td>
                            <button class="btn btn-edit btn-default" data-id="{{$pengguna->id}}">
                                <i class="fa fa-eye text-success mr-2 pointer" ></i> Edit
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