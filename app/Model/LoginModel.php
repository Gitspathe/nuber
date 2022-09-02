<?php
namespace App\Model;

class LoginModel 
{
    protected $username;
    protected $password;
    protected $accountType;

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAccountType()
    {
        return $this->accountType;
    }

    public function setUsername($val)
    {
        if($val === null || trim($val) === '') {
            throw new \Exception("Please enter a username.");
        }
        if(strlen($val) < 3) {
            throw new \Exception("Username is too short. Minimum 3 characters.");
        }
        $this->username = $val;
    }

    public function setPassword($val)
    {
        if($val === null || trim($val) === '') {
            throw new \Exception("Please enter a password.");
        }
        if(strlen($val) < 8) {
            throw new \Exception("Password must be at least 8 characters in length.");
        }
        if (!preg_match('/[A-Za-z]/', $val) || !preg_match('/[0-9]/', $val)) {
            throw new \Exception("Password must contain numbers and letters.");
        }
        $this->password = $val;
    }

    public function setAccountType($val)
    {
        $this->accountType = $val;
    }
}
?>