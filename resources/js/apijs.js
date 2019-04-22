$(document).ready(function(){

    $('#formRegistro').submit(function(e){
        e.preventDefault();
        var data = {
            nome_usuario: $('#nome_usuario').val(),
            email:$('#email').val(),
            password: $('#password').val(),
            nome: $('#nome').val(),
            sobrenome: $('#sobrenome').val(),
            date: $('#date').val(),
            fone: $('#fone').val(),
            tipo: $('#tipo').val(),
            };
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: baseurl + 'register/post',
            data: data,
            method: 'POST',
            success: function (data) {
                if(data){
                    $('#modalsucesso').modal('show');
                }
                else{
                    $('#modalsucesso').modal('hide');
                }
            }
        });

    });

    $('.fechar-modal').click(function(){
        window.location.href= baseurl+'home';
    });
});