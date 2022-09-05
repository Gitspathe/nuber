<?php
namespace App\Controller;

require(APP_DIR . "/Model/IndexModel.php");

class IndexController
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\IndexModel();
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;

        if(isset($_GET["action"])) {
            session_start();
            if($_GET["action"] === "signout") {
                $_SESSION = array();
            }
        }

        require_once APP_DIR . '/View/IndexView.php';
    }
}
?>