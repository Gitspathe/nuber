<?php
namespace App\Controller;

require(APP_DIR . "/Helper/DatabaseHandler.php");
require(APP_DIR . '/Model/SignupModel.php');

class SignupController extends \App\Helper\DatabaseHandler
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\SignupModel();
    }

    protected function checkPost()
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

    protected function checkUser()
    {
        $username = $this->model->getUsername();
        $email = $this->model->getEmail();

        $pdo = $this->connect()->prepare("SELECT user_username from users WHERE user_username = ? OR user_email = ?;");

        if(!$pdo->execute(array($username, $email))) {
            $pdo = null;
            throw new \Exception("Database error: " . $pdo->errorInfo());
        }

        if($pdo->rowCount() > 0) {
            $pdo = null;
            throw new \Exception("A user with that username or email already exists.");
        }
        $pdo = null;
    }

    protected function registerUser() 
    {
        $username = $this->model->getUsername();
        $email = $this->model->getEmail();
        $hashedPassword = password_hash($this->model->getPassword(), PASSWORD_DEFAULT);
        $accountType = $this->model->getAccountType();
        
        $pdo = $this->connect()->prepare("INSERT INTO users (user_username, user_email, user_password, user_accountType) VALUES (?, ?, ?, ?);");

        if(!$pdo->execute(array($username, $email, $hashedPassword, $accountType))) {
            $pdo = null;
            throw new \Exception("Database error: " . $pdo->errorInfo());
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

        // Attempted sign up.
        if($this->checkPost()) {

            $success = true;
            try {
                // Verify and set model values.
                $model->setEmail($_POST["email"]);
                $model->setUsername($_POST["username"]);

                if($_POST["password"] !== $_POST["repeatPassword"]) {
                    throw new \Exception("Passwords do not match.");
                }

                $model->setPassword($_POST["password"]);
                $model->setAccountType($_POST["accountType"]);

                // Verification complete, check database.
                $this->checkUser();

                // User does not exist and no DB errors - so add the user.
                $this->registerUser();

                // User is added, so fetch their info from the DB.
                $userInfo = $this->getUserInfo();

                // Registration complete - go to landing page.
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
                // Handle errors.
            }

            if($success) {
                // There were no errors, take user to the landing page.
                header("Location: landing.php");
                exit;
            } else {
                // There were errors, display signup page with error message.
                require_once APP_DIR . '/View/SignupView.php';
            }

            return;
        }

        // Regular page - no sign up attempt.
        require_once APP_DIR . '/View/SignupView.php';
    }
}
?>