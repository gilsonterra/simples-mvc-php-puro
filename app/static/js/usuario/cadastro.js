$(function() {   
    var $form = $('#formulario');
    var $btnSalvar = $('#btnSalvar');

    function renderLoadingButton(status){
        if(status){
            $btnSalvar.html('enviando...').attr('disabled', true);
        }
        else{
            $btnSalvar.html('Gravar').attr('disabled', false);
        }        
    }

    function salvar(){
        var usuario_id = $('#usuario_id').val();
        var nome = $('#nome').val();
        var login = $('#login').val();
        var senha = $('#senha').val();
        var ativo = $('#ativo').prop('checked') ? 1 : 0;

        $.ajax({
            url: '/usuario-salvar',
            method: 'POST',
            dataType: 'json',
            data: {
                usuario_id: usuario_id,
                nome_completo: nome,
                login: login,
                senha: senha,
                ativo: ativo
            },
            beforeSend: function(){
                renderLoadingButton(true);
            }
        }).then(function(data){
            if(!data.success){                
                toastr["error"](data.message);
            }
            else{
                toastr["success"](usuario_id ? 'Alterado com sucesso!' : 'Salvo com sucesso!');
                setTimeout(() => {
                    window.location.href = '/usuario-pesquisa';
                }, 1000);
            }
        })
        .always(function(){
            renderLoadingButton(false);
        });
    }

    $form.submit(function(e){
        e.preventDefault();
        salvar();
    });    
});