<?php
namespace Controllers;

final class NotFoundController extends AbstractController {
    
    public function indexView(){
        $this->renderView('not_found.php');
    }
}