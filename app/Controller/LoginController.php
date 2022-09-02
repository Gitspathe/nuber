<?php
namespace App\Controller;

class LoginController 
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\LoginModel();
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        require_once APP_DIR . '/View/LoginView.php';
    }
}
?>