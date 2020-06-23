$(function() {    
    var $formPesquisar = $('#form-container-pesquisa');
    var $tableUsuario = $('#table-usuario-pesquisar');    
    var $totalUsuario = $('#total-usuario');

    $formPesquisar.submit(function(e){
        e.preventDefault();
        pesquisarUsuario();
    });

    function renderTable(usuarios){
        $tableUsuario.html('');
        $totalUsuario.html(usuarios.length);

        if(usuarios && usuarios.length <= 0){
            $tableUsuario.html('nenhum registro encontrado!');
            return;
        }

        $.each(usuarios, function(index, usuario){            
            var $tr = $('<tr />');            
            var $btnDelete = $('<button />')
                .addClass('w3-button w3-theme w3-margin-top w3-margin-right')
                .append('<i class="fas fa-user-times" />')
                .attr('title', 'Deletar')
                .on('click', function(){
                    if(confirm(`Realmente deseja excluir o usuário: ${usuario.nome_completo}?`)){
                        deleteUsuario(usuario.usuario_id);
                    }
                });

            var $btnEdit = $('<a />').addClass('w3-button w3-theme w3-margin-top')
                .attr('title', 'Alterar')
                .attr('href', `/usuario-cadastro/${usuario.usuario_id}`)
                .append('<i class="fas fa-edit" />');
                
            $('<td />').append(usuario.nome_completo).appendTo($tr);
            $('<td />').append(usuario.login).appendTo($tr);
            $('<td />').append(renderStatus(usuario.ativo)).appendTo($tr);
            $('<td />').addClass('text-align').append($btnDelete).append($btnEdit).appendTo($tr);            
            $tableUsuario.append($tr);
        });
    }

    function renderLoading(){
        $tableUsuario.html('carregando...');  
        $tableUsuario.html('0');
    }

    function renderStatus(status){
        return status == "1" ? 'Sim' : 'Não';
    }

    function pesquisarUsuario(){
        var $nome = $('#filtro-nome').val();
        getUsuarios({'nome_completo': $nome});
    }

    function getUsuarios(filter){
        $.ajax({
            url: '/usuario-buscar',
            method: 'POST',
            dataType: 'json',
            data: filter,
            beforeSend: function(){
                renderLoading();
            }
        })        
        .done(function(data){                     
            renderTable(data);
        })
    }

    function deleteUsuario(id){
        $.ajax({
            url: `/usuario-deletar/${id}`,
            method: 'GET',
            dataType: 'json',            
            beforeSend: function(){
                renderLoading();
            }
        })        
        .done(function(data){                     
            getUsuarios();
        })
    }

    getUsuarios();
});