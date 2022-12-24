function getData() {
    $.ajax({
        type: "get",
        url: "/surat-keluar/render",
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
        url: "/surat-keluar/create",
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
    let count = 1;
    $('body').on('click', '.btn-save', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formAdd')[0]
        let data = new FormData(form)
        if($('.internal').is(':checked') || $('.eksternal').is(':checked')) {
            if($('.internal').is(':checked')) {
                if($($('#tujuan').val()).length == 0) {
                    $('#tujuan').addClass('is-invalid');
                    $('.error-tujuan').html('Tujuan tidak boleh kosong');
                } else {
                    $('#tujuan').removeClass('is-invalid');
                    $('.error-tujuan').html('');
                }
            }

            if($('.eksternal').is(':checked')) {
                let countLast = $('.tujuan_keluar').last().data('id');
                for (let j = 1; j <= countLast; j++) {
                    let id = $('#tujuan-keluar-'+j).data('id')
                    if($('#tujuan-keluar-'+id).val() == '') {
                        $('#tujuan-keluar-'+id).addClass('is-invalid');
                        $('.error-tujuan_keluar_'+id).html('Tujuan keluar tidak boleh kosong');
                    } else {
                        $('#tujuan-keluar-'+id).removeClass('is-invalid');
                        $('.error-tujuan_keluar_'+id).html('');
                    }
                }
            }

            $.ajax({
                type: "POST",
                url: "/surat-keluar/store",
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
        } else {
            $.ajax({
                type: "POST",
                url: "/surat-keluar/store",
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
        }
    });

    $('body').on('click', '.btn-edit', function () {
        let id = $(this).data('id')
        $.ajax({
            type: "get",
            url: "/surat-keluar/edit/" + id,
            dataType: "json",
            success: function (response) {
                $(".render").html(response.data);
                setTimeout(() => {
                    if($('.internal').is(':checked')) {
                        $('.div-tujuan').prop('hidden', false)
                    }
                    if($('.eksternal').is(':checked')) {
                        $('.div-tujuan-keluar').prop('hidden', false)
                    }
                }, 500);
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

        if($('.internal').is(':checked') || $('.eksternal').is(':checked')) {
            if($('.internal').is(':checked')) {
                if($($('#tujuan').val()).length == 0) {
                    $('#tujuan').addClass('is-invalid');
                    $('.error-tujuan').html('Tujuan tidak boleh kosong');
                } else {
                    $('#tujuan').removeClass('is-invalid');
                    $('.error-tujuan').html('');
                }
            }

            if($('.eksternal').is(':checked')) {
                let countLast = $('.tujuan_keluar').last().data('id');
                for (let j = 1; j <= countLast; j++) {
                    let id = $('#tujuan-keluar-'+j).data('id')
                    if($('#tujuan-keluar-'+id).val() == '') {
                        $('#tujuan-keluar-'+id).addClass('is-invalid');
                        $('.error-tujuan_keluar_'+id).html('Tujuan keluar tidak boleh kosong');
                    } else {
                        $('#tujuan-keluar-'+id).removeClass('is-invalid');
                        $('.error-tujuan_keluar_'+id).html('');
                    }
                }
            }

            $.ajax({
                type: "POST",
                url: "/surat-keluar/update",
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
        } else {
            $.ajax({
                type: "POST",
                url: "/surat-keluar/update",
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
        }
    });

    let tembusan_keluar = '<div class="input-group mb-3">' +
                        '<input type="text" class="form-control tembusan_keluar" id="tembusan-keluar" name="tembusan_keluar[]">' +
                        '<div class="input-group-append">' +
                            '<span class="input-group-text bg-danger text-white pointer btn-tembusan-delete" id="basic-addon2">' +
                                '<i class="fa fa-trash"></i> Hapus' +
                            '</span>'+
                        '</div>'+
                    '</div>';

    $('body').on('click', '.btn-tujuan', function() {
        count = count + 1;
        let tujuan_keluar = '<div class="input-group mb-3">' +
                        '<input type="text" class="form-control tujuan_keluar" id="tujuan-keluar-'+count+'" data-id="'+count+'" name="tujuan_keluar[]">' +
                        '<div class="input-group-append">' +
                            '<span class="input-group-text bg-danger text-white pointer btn-tujuan-delete" id="basic-addon2">' +
                                '<i class="fa fa-trash"></i> Hapus' +
                            '</span>'+
                        '</div>'+
                        '<div class="invalid-feedback error-tujuan_keluar_'+count+'"></div>'
                    '</div>';

        $('.tujuan-keluar-group').append(tujuan_keluar);
    });

    $('body').on('click', '.btn-tembusan', function() {
        $('.tembusan-keluar-group').append(tembusan_keluar);
    });

    $('body').on('click', '.btn-tujuan-delete', function() {
        // count = count - 1;
        $(this).closest('.input-group').remove();
    });

    $('body').on('click', '.btn-tembusan-delete', function() {
        $(this).closest('.input-group').remove();
    });

    $('body').on('change', '.internal', function() {
        if(this.checked) {
            $('.div-tujuan').prop('hidden', false)
        } else {
            $('.div-tujuan').prop('hidden', true)
        }
    });

    $('body').on('change', '.eksternal', function() {
        if(this.checked) {
            $('.div-tujuan-keluar').prop('hidden', false)
        } else {
            $('.div-tujuan-keluar').prop('hidden', true)
        }
    });
});