<?php

namespace Controllers;

final class IndexController extends AbstractController
{

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function indexView()
    {
        $this->renderView('index.php');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
    }

    public function logarJson()
    {
        $data = $_POST;

        $usuario = $this->model->login($data['login'], $data['senha']);

        if (!empty($usuario)) {

            if ($usuario['ativo'] != 1) {
                $result = array(
                    'success' => false,
                    'message' => 'Usuário inativado!'
                );
            } else {
                $_SESSION['logado'] = $usuario;
                $result = array(
                    'success' => true,
                    'message' => 'Usuário logado com sucesso!',
                    'data' => $usuario
                );
            }
        } else {
            $result = array(
                'success' => false,
                'message' => 'Login ou senha inválidos!'
            );
        }

        $this->renderJson($result);
    }
}
