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
        $this->username = $val;
    }

    public function setPassword($val)
    {
        $this->password = $val;
    }

    public function setAccountType($val)
    {
        $this->accountType = $val;
    }
}
?>