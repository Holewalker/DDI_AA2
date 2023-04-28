<?php
require_once("../ddbb/DBConexion.php");

class user
{
    public $userId;
    public $username;
    public $email;
    public $pass;
    public PDO $db;

    /**
     * @param $userId
     * @param $username
     * @param $email
     */
    public function __construct($userId, $username, $email)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->db = DBConexion::connection();
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
        //$sql = $db->query("SELECT * FROM users where username = '.$username' and pass = '.$pass'");
        //$respuesta = $db->prepare($sql);
        $respuesta = $db->prepare("SELECT * FROM users where username = '.$username' and pass = '.$pass'");
        $respuesta = $respuesta->fetch();
        if ($respuesta) {
            $usuario = new user($respuesta["userId"], $respuesta["username"], $respuesta["email"]);
            return $usuario->getUsername();
        } else {
            return null;
        }
    }

    public function createUser($username, $email, $password)
    {
        try {
            $saltedPass = self::crypMd5($password);
            $query = "INSERT INTO users (username, email, pass) VALUES (:username,:email, :pass)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $saltedPass);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }


}