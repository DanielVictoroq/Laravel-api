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
            n_apt: $('#n_apt').val(),
        };
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: baseurl + 'register/post',
            data: data,
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if(data){
                    $('.modal-title').text('Sucesso');
                    $('#modalsucesso').modal('show');
                }
                else{
                    $('.modal-title').text('Nome de Usuário já existe');
                    $('#modalsucesso').modal('show');
                }
            }
        });
        
    });
    
    if ($(window).width() < 426) {
        $('.headermenu').addClass('nav-link');
    }
    else {
        $('.headermenu').removeClass('nav-link');
    }
    
    $('.concluir-sin').click(function(){
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: baseurl + 'sindico-post',
            data: {sindico : $('#sindico').val()},
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    $('.modal-title').text('Sucesso');
                    $('#modalsucesso').modal('show');
                }
                else {
                    $('.modal-title').text('Nome de Usuário já existe');
                    $('#modalsucesso').modal('show');
                }
            }
        });
    });
    
    $('.fechar-modal').click(function(){
        window.location.href= baseurl+'home';
    });
});