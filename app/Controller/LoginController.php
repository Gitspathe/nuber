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
        $error = null;

        // Attempted login.
        if(isset($_POST['username']) || isset($_POST['password'])) {

            $success = true;
            try {
                $model->setUsername(htmlspecialchars($_POST['username']));
                $model->setPassword(htmlspecialchars($_POST['password']));
            } catch(\Exception $e) {
                $error = $e->getMessage();
                $success = false;
                // Handle errors.
            }

            if($success) {
                // Check if account exists...
                // Then log in...
            } else {
                require_once APP_DIR . '/View/LoginView.php';
            }

            return;
        }

        // Regular page - no login attempt.
        require_once APP_DIR . '/View/LoginView.php';
    }
}
?>