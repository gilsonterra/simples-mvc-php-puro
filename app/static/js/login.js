$(function() {   
    var $form = $('#form-login');


    function login(){
        var login = $('#login').val();
        var senha = $('#senha').val();

        $.ajax({
            url: '/autenticar',
            method: 'POST',
            dataType: 'json',
            data: {
                login: login,
                senha: senha
            },
            beforeSend: function(){
                
            }
        }).then(function(data){
            if(!data.success){                
                toastr["error"](data.message);
            }
            else{
                toastr["success"]('Usuário autenticado com sucesso!');
                setTimeout(() => {
                    window.location.href = '/usuario-pesquisa';
                }, 1000);
            }
        })
        .always(function(){
            
        });
    }


    $form.submit(function(e){
        e.preventDefault();
        login();
    });
});