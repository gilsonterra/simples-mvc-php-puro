<?php
namespace Controllers;

final class ErrorController extends AbstractController {
    
    public function indexView($message){
        $this->renderView('error.php', array('message' => $message));
    }
}