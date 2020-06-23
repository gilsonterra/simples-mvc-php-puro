<?php
session_start();
define('URL_SERVER', sprintf("http://%s", $_SERVER['HTTP_HOST']));
$request = $_SERVER['REQUEST_URI'];
$requestParams = explode('/', substr($request, 1));
$action = $requestParams[0];
$id = !empty($requestParams[1]) ? $requestParams[1] : null;


// Check login
$allowActions = array('login', 'autenticar');
if (empty($_SESSION['logado']) && !in_array($action, $allowActions)) {
    header('Location: login');
}


require DIR_MODELS . '/AbstractModel.php';
require DIR_MODELS . '/UsuarioModel.php';

require DIR_CONTROLLERS . '/AbstractController.php';
require DIR_CONTROLLERS . '/NotFoundController.php';
require DIR_CONTROLLERS . '/ErrorController.php';
require DIR_CONTROLLERS . '/IndexController.php';
require DIR_CONTROLLERS . '/UsuarioController.php';

try {

    switch ($action) {
        case '':
        case 'login':
            $controller = new Controllers\IndexController(new Model\UsuarioModel());
            $controller->indexView();
            break;

        case 'logout':
            $controller = new Controllers\IndexController(new Model\UsuarioModel());
            $controller->logout();
            break;

        case 'autenticar':
            $controller = new Controllers\IndexController(new Model\UsuarioModel());
            $controller->logarJson();
            break;

        case 'usuario-cadastro':
            $controller = new Controllers\UsuarioController(new Model\UsuarioModel());
            $controller->cadastroView($id);
            break;

        case 'usuario-pesquisa':
            $controller = new Controllers\UsuarioController(new Model\UsuarioModel());
            $controller->pesquisaView();
            break;

        case 'usuario-buscar':
            $controller = new Controllers\UsuarioController(new Model\UsuarioModel());
            $controller->buscarJson();
            break;

        case 'usuario-deletar':
            $controller = new Controllers\UsuarioController(new Model\UsuarioModel());
            $controller->deletarJson($id);
            break;

        case 'usuario-salvar':
            $controller = new Controllers\UsuarioController(new Model\UsuarioModel());
            $controller->salvarJson();
            break;

        default:
            $controller = new Controllers\NotFoundController();
            $controller->indexView();
            break;
    }
} catch (\Exception $e) {
    $controller = new Controllers\ErrorController();
    $controller->indexView($e->getMessage());
}
