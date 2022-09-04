<?php
namespace App\Controller;

require(APP_DIR . '/Model/FileUploadModel.php');

class FileUploadController
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\FileUploadModel();
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;

        require_once APP_DIR . '/View/FileUploadView.php';
    }
}
?>