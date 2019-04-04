$(document).ready(function(){

    $('#formRegistro').submit(function(e){
        e.preventDefault();
        var data = {
            name: $('#name').val(),
            email:$('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password-confirm').val(),

            };
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: baseurl + 'register-user',
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