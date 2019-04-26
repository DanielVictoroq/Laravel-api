$(document).ready(function () {
    $('#formPredio').submit(function (e) {
        e.preventDefault();
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: baseurl + 'alteracoes',
            data: {
                condominio: $('#condominio').val(),
                agua: $('#agua').val(),
                luz: $('#luz').val(),
                faxina: $('#faxina').val(),
                elevador: $('#elevador').val(),
                caixa: $('#caixa').val(),
            },
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    $('.criar-recado-danger').hide();
                    $('.criar-recado-success').show();
                    setTimeout(function () {
                        location.reload();
                    }, 2000)
                }
                else {
                    $('.criar-recado-success').hide();
                    $('.criar-recado-danger').show();
                    setTimeout(function () {
                        $('.criar-recado-danger').hide();
                    }, 2000)
                }
            }
        });
    });
});