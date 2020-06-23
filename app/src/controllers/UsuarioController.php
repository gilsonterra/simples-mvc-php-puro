<?php
namespace Controllers;

final class UsuarioController extends AbstractController {
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function cadastroView($id = null){
        $dados = array(
            'usuario_id' => '',
            'nome_completo' => '',
            'login' => '',
            'senha' => '',
            'ativo' => 1,
        );
        if(!empty($id)){
            $dados = $this->model->find($id);
        }        
        
        $this->renderView('usuario/cadastro.php', array('dados' => $dados));
    }

    public function pesquisaView(){                
        $this->renderView('usuario/pesquisa.php', ['usuarios' => []]);
    }

    public function deletarJson($id){        
        $result = $this->model->delete( $id );
        $this->renderJson($result);
    }

    public function buscarJson(){
        $filter = $_POST;
        $usuarios = $this->model->fetchAll( $filter );
        $this->renderJson($usuarios);
    }

    public function salvarJson(){
        $dados = $_POST;
        $id = $dados['usuario_id'];
        unset($dados['usuario_id']);

        if(!empty($id)){
            $result = $this->model->update($id, $dados);
        }
        else{            
            $result = $this->model->insert($dados);
        }

        
        $this->renderJson($result);
    }
}