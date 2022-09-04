<?php
namespace App\Controller;

require(APP_DIR . "/Controller/FileUploadController.php");

class LandingController
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\LandingModel();
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;

        require_once APP_DIR . '/View/LandingView.php';
    }
}
?>