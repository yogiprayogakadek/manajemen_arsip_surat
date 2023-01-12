function getData() {
    $.ajax({
        type: "get",
        url: "/surat-masuk/render",
        dataType: "json",
        success: function (response) {
            $(".render").html(response.data);
        },
        error: function (error) {
            console.log("Error", error);
        },
    });
}

function tambah() {
    $.ajax({
        type: "get",
        url: "/surat-masuk/create",
        dataType: "json",
        success: function (response) {
            $(".render").html(response.data);
        },
        error: function (error) {
            console.log("Error", error);
        },
    });
}

$(document).ready(function () {
    getData();

    $('body').on('click', '.btn-add', function () {
        tambah();
    });

    $('body').on('click', '.btn-data', function () {
        getData();
    });

    // on save button
    $('body').on('click', '.btn-save', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formAdd')[0]
        let data = new FormData(form)
        $.ajax({
            type: "POST",
            url: "/surat-masuk/store",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.btn-save').attr('disable', 'disabled')
                $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function () {
                $('.btn-save').removeAttr('disable')
                $('.btn-save').html('Simpan')
            },
            success: function (response) {
                $('#formAdd').trigger('reset')
                $(".invalid-feedback").html('')
                getData();
                Swal.fire(
                    response.title,
                    response.message,
                    response.status
                );
            },
            error: function (error) {
                let formName = []
                let errorName = []

                $.each($('#formAdd').serializeArray(), function (i, field) {
                    formName.push(field.name.replace(/\[|\]/g, ''))
                });
                if (error.status == 422) {
                    if (error.responseJSON.errors) {
                        $.each(error.responseJSON.errors, function (key, value) {
                            errorName.push(key)
                            if($('.'+key).val() == '') {
                                $('.' + key).addClass('is-invalid')
                                $('.error-' + key).html(value)
                            }
                        })
                        $.each(formName, function (i, field) {
                            $.inArray(field, errorName) == -1 ? $('.'+field).removeClass('is-invalid') : $('.'+field).addClass('is-invalid');
                        });
                    }
                }
            }
        });
    });

    $('body').on('click', '.btn-edit', function () {
        let id = $(this).data('id')
        $.ajax({
            type: "get",
            url: "/surat-masuk/edit/" + id,
            dataType: "json",
            success: function (response) {
                $(".render").html(response.data);
            },
            error: function (error) {
                console.log("Error", error);
            },
        });
    });

    // on update button
    $('body').on('click', '.btn-update', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formEdit')[0]
        let data = new FormData(form)
        $.ajax({
            type: "POST",
            url: "/surat-masuk/update",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.btn-update').attr('disable', 'disabled')
                $('.btn-update').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function () {
                $('.btn-update').removeAttr('disable')
                $('.btn-update').html('Simpan')
            },
            success: function (response) {
                $('#formEdit').trigger('reset')
                $(".invalid-feedback").html('')
                getData();
                Swal.fire(
                    response.title,
                    response.message,
                    response.status
                );
            },
            error: function (error) {
                let formName = []
                let errorName = []

                $.each($('#formEdit').serializeArray(), function (i, field) {
                    formName.push(field.name.replace(/\[|\]/g, ''))
                });
                if (error.status == 422) {
                    if (error.responseJSON.errors) {
                        $.each(error.responseJSON.errors, function (key, value) {
                            errorName.push(key)
                            if($('.'+key).val() == '') {
                                $('.' + key).addClass('is-invalid')
                                $('.error-' + key).html(value)
                            }
                        })
                        $.each(formName, function (i, field) {
                            $.inArray(field, errorName) == -1 ? $('.'+field).removeClass('is-invalid') : $('.'+field).addClass('is-invalid');
                        });
                    }
                }
            }
        });
    });

    let lampiran = '<div class="input-group mb-3">' +
                        '<input type="file" class="form-control file-lampiran" id="file-lampiran" name="file_lampiran[]">' +
                        '<div class="input-group-append">' +
                            '<span class="input-group-text bg-danger text-white pointer btn-lampiran-delete" id="basic-addon2">' +
                                '<i class="fa fa-trash"></i> Hapus' +
                            '</span>'+
                        '</div>'+
                    '</div>';

    $('body').on('click', '.btn-lampiran', function() {
        $('.lampiran-group').append(lampiran);
    });

    $('body').on('click', '.btn-lampiran-delete', function() {
        $(this).closest('.input-group').remove();
    });
    
    $('body').on('click', '.btn-surat', function() {
        let surat = $(this).data('surat')
        if(surat == "") {
            Swal.fire(
                "Info",
                "Tidak ada file surat yang di unggah sebelumnya",
                'info'
            );
        } else {
            window.open(assets(surat), '_blank');
        }
    });

    $('body').on('click', '.btn-lampiran-view', function() {
        let id = $(this).data('id')
        $('#tableLampiran tbody').empty();
        $.get("/surat-masuk/lampiran/"+id, function (data) {
            $.each(data, function (index, val) { 
                let tr_list = '<tr>' +
                                '<td>' + (index+1) + '</td>' +
                                '<td>' + '<a href="'+assets(val.lampiran)+'" target="_blank">Lihat lampiran</a>' + '</td>' +
                                '<td>' + '<button type=button class="btn btn-danger btn-remove-lampiran" data-surat-id="'+id+'" data-lampiran-id="'+val.id+'"><i class="fa fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                $('#tableLampiran tbody').append(tr_list);
            });
        });

        $('#modalLampiran').modal('show')
    });

    $('body').on('click', '.btn-remove-lampiran', function() {
        let lampiran_id = $(this).data('lampiran-id')
        let surat_id = $(this).data('surat-id')

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "get",
                    url: "/surat-masuk/hapus-lampiran/"+surat_id+"/"+lampiran_id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == "success") {
                            $('#tableLampiran tbody').empty();
                            $.get("/surat-masuk/lampiran/"+surat_id, function (data) {
                                $.each(data, function (index, val) { 
                                    let tr_list = '<tr>' +
                                                    '<td>' + (index+1) + '</td>' +
                                                    '<td>' + '<a href="'+assets(val.lampiran)+'" target="_blank">Lihat lampiran</a>' + '</td>' +
                                                    '<td>' + '<button type=button class="btn btn-danger btn-remove-lampiran" data-surat-id="'+id+'" data-lampiran-id="'+val.id+'"><i class="fa fa-trash"></i></button>' + '</td>' +
                                                '</tr>';
                                    $('#tableLampiran tbody').append(tr_list);
                                });
                            })
                        }
                        Swal.fire(
                            response.title,
                            response.message,
                            response.status
                        );
                    },
                    error: function (error) {
                        console.log("Error", error);
                    },
                });
            }
        })
    });

    // TEST
    $('body').on('click', function() {
        $.get("/surat-masuk/hapus-lampiran/"+surat_id+"/"+lampiran_id, function (response) {
            if(response.status == "success") {
                $('#tableLampiran tbody').empty();
                $.get("/surat-masuk/lampiran/"+surat_id, function (data) {
                    $.each(data, function (index, val) { 
                        let tr_list = '<tr>' +
                                        '<td>' + (index+1) + '</td>' +
                                        '<td>' + '<a href="'+assets(val.lampiran)+'" target="_blank">Lihat lampiran</a>' + '</td>' +
                                        '<td>' + '<button type=button class="btn btn-danger btn-remove-lampiran" data-surat-id="'+id+'" data-lampiran-id="'+val.id+'"><i class="fa fa-trash"></i></button>' + '</td>' +
                                    '</tr>';
                        $('#tableLampiran tbody').append(tr_list);
                    });
                })
            }
            Swal.fire(
                response.title,
                response.message,
                response.status
            );
        });
    })
});