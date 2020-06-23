<?php

namespace Controllers;

use Exception;

abstract class AbstractController
{
    private function getFileViewPath($fileName)
    {
        $filePath = sprintf('%s/%s', DIR_VIEWS, $fileName);

        if (!file_exists($filePath)) {
            throw new Exception(sprintf('View %s não foi encontrada.', $filePath));
        }

        return $filePath;
    }

    protected function render($fileName, $data = array())
    {
        $filePath = $this->getFileViewPath($fileName);

        if (is_array($data)) {
            extract($data);
        }

        ob_start();
        include $filePath;
        echo ob_get_clean();
    }

    protected function renderView($fileName, $data = array())
    {
        $filePath = $this->getFileViewPath($fileName);
        $args = array_merge(array('content' => $filePath), $data);
        $this->render('layout.php', $args);
    }

    protected function renderJson($data = array()){
        echo json_encode($data);
    }
}
