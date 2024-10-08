<?php
namespace App\Controller;

require(APP_DIR . "/Helper/DatabaseHandler.php");
require(APP_DIR . "/Model/LoginModel.php");

class LoginController extends \App\Helper\DatabaseHandler
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\LoginModel();
    }

    protected function checkPost()
    {
        if(isset($_POST["username"]) 
        || isset($_POST["password"])) {
            return true;
        }
        return false;
    }

    protected function checkUser() 
    {
        $username = $this->model->getUsername();
        $password = $this->model->getPassword();

        $pdo = $this->connect()->prepare("SELECT user_password FROM users WHERE user_username = ?;");

        if(!$pdo->execute(array($username))) {
            $pdo = null;
            throw new \Exception("Database error: " . $pdo->errorInfo());
        }
        if($pdo->rowCount() == 0) {
            $pdo = null;
            throw new \Exception("Error signing in. Please make sure your username and password are correct.");
        }

        $hashedPassword = $pdo->fetchAll(\PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]["user_password"]);
        
        if(!$checkPassword) {
            $pdo = null;
            throw new \Exception("Error signing in. Please make sure your username and password are correct.");
        }
        $pdo = null;
    }

    protected function getUserInfo()
    {
        $username = $this->model->getUsername();
        
        $pdo = $this->connect()->prepare("SELECT user_ID, user_username, user_email, user_accountType, user_uploadedDocuments FROM users WHERE user_username = ?;");

        if(!$pdo->execute(array($username))) {
            $pdo = null;
            throw new \Exception("Database error: " . $pdo->errorInfo());
        }
        if($pdo->rowCount() == 0) {
            $pdo = null;
            throw new \Exception("Database error: " . $pdo->errorInfo());
        }

        $ret = $pdo->fetchAll(\PDO::FETCH_ASSOC)[0];
        $pdo = null;
        return $ret;
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;

        // Attempted login.
        if($this->checkPost()) {

            $success = true;
            try {
                // Verify and set model parameters.
                $model->setUsername($_POST['username']);
                $model->setPassword($_POST['password']);

                // Check if the username & password is correct.
                $this->checkUser();

                // User info is correct, fetch data.
                $userInfo = $this->getUserInfo();
                
                // Start session.
                session_start();
                $_SESSION["auth"] = 1;
                $_SESSION["user_id"] = $userInfo["user_ID"];
                $_SESSION["user_username"] = $userInfo["user_username"];
                $_SESSION["user_email"] = $userInfo["user_email"];
                $_SESSION["user_accountType"] = $userInfo["user_accountType"];
                $_SESSION["user_uploadedDocuments"] = (int)$userInfo["user_uploadedDocuments"];

            } catch(\Exception $e) {
                $error = $e->getMessage();
                $success = false;
            }

            if($success) {
                // There were no errors - take user to the landing page.
                header("Location: landing.php");
                exit;
            } else {
                // There were errors - display login page with error messages.
                require_once APP_DIR . '/View/LoginView.php';
            }

            return;
        }

        // Regular page - no login attempt.
        require_once APP_DIR . '/View/LoginView.php';
    }
}
?>