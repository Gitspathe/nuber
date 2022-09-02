<?php
namespace App\Controller;

class SignupController 
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\SignupModel();
    }

    public function checkPost()
    {
        if(isset($_POST["email"]) 
        || isset($_POST["username"]) 
        || isset($_POST["password"]) 
        || isset($_POST["repeatPassword"]) 
        || isset($_POST["accountType"])) {
            return true;
        }
        return false;
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;

        // Attempted sign up.
        if($this->checkPost()) {

            $success = true;
            try {
                $model->setEmail($_POST["email"]);
                $model->setUsername($_POST["username"]);

                if($_POST["password"] !== $_POST["repeatPassword"]) {
                    throw new \Exception("Passwords do not match.");
                }

                $model->setPassword($_POST["password"]);
            } catch(\Exception $e) {
                $error = $e->getMessage();
                $success = false;
                // Handle errors.
            }

            if($success) {
                // Check if account exists...
                // Then sign up...
            } else {
                require_once APP_DIR . '/View/SignupView.php';
            }

            return;
        }

        // Regular page - no sign up attempt.
        require_once APP_DIR . '/View/SignupView.php';
    }
}
?>