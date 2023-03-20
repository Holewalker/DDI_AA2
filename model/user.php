<?php
require_once("conexion/conexionheader.php");

class user
{
    public $userId;
    public $username;
    public $email;
    public $pass;

    public function __construct()
    {
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function checkCredentials($username, $pass)
    {
        global $conexion;
        if (!$conexion)
            die();
        $query = "SELECT * FROM users where username = '.$username' and pass = md5('.$pass')";
        return $res = mysqli_query($conexion, $query);
    }

}