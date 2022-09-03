<?php
namespace App;

class DatabaseHandler
{
    protected function connect() 
    {
        try {
            global $_NUBER_CONF;

            $host = $_NUBER_CONF["db_host"];
            $name = $_NUBER_CONF["db_name"];
            $username = $_NUBER_CONF["db_username"];
            $password = $_NUBER_CONF["db_password"];
            $pdo = new \PDO("mysql:host=" . $host . ";dbname=" . $name . ";", $username, $password);
            return $pdo;
        } catch(\PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>