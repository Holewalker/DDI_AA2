<?php
require_once("ddbb/conexionheader.php");

class user
{
    public $userId;
    public $username;
    public $email;
    public $pass;

    /**
     * @param $userId
     * @param $username
     * @param $email
     * @param $pass
     */
    public function __construct($userId, $username, $email, $pass)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->pass = $pass;
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


    public static function crypMd5($password)
    {
        //Crea un salt
        $password = md5($password);
        return $password;
    }

    /*
    * @param String $pass;
     */
    public function checkCredentials($username, $pass)
    {
        $pass = self::crypMd5($pass);
        $db = DBConexion::connection();
        $sql = $db->query("SELECT * FROM users where username = '.$username' and pass = '.$pass'");
        $respuesta = $db->prepare($sql);
        $respuesta = $respuesta->fetch();
        if ($respuesta) {
            $usuario = new user($respuesta["userId"], $respuesta["username"], $respuesta["email"]);
            return $usuario;
        } else {
            return $usuario = null;
        }
        $respuesta->closeCursor();
        $conexion = null;
    }

}