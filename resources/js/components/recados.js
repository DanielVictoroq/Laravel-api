$(document).ready(function(){
    $('#formRecado').submit(function (e) {
        e.preventDefault();
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: baseurl + 'post-recados',
            data: {
                recado: $('#recado').val(),
                titulorecado: $('#titulorecado').val()
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
    $('.exc-recado').submit(function(e){
        e.preventDefault();
        recado = $(this).find('button').data('rec');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: baseurl + 'excluir-recado',
            data: {
                recado: recado,
            },
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    $('.excl-recado-danger').hide();
                    $('.excl-recado-success').show();
                    setTimeout(function(){
                        location.reload();
                    }, 3000)
                }
                else {
                    $('.excl-recado-success').hide();
                    $('.excl-recado-danger').show();
                    setTimeout(function () {
                        $('.excl-recado-danger').hide();
                    }, 3000)
                }
            }
        });
    });
});