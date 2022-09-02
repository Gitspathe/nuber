<?php
namespace App\Model;

class LoginModel 
{
    protected $username;
    protected $password;

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($val)
    {
        $val = htmlspecialchars($val);
        if($val === null || trim($val) === '') {
            throw new \Exception("Please enter your username.");
        }
        $this->username = $val;
    }

    public function setPassword($val)
    {
        $val = htmlspecialchars($val);
        if($val === null || trim($val) === '') {
            throw new \Exception("Please enter your password.");
        }
        $this->password = $val;
    }
}
?>