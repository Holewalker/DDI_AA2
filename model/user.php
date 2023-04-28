<?php
require_once('../ddbb/DBConexion.php');

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

    public static function crypt($password)
    {
        $password = sha1($password);
        return $password;
    }

    /*
    * @param String $pass;
     */
    public static function checkCredentials($username, $pass)
    {
        $passC = self::crypt($pass);
        $db = DBConexion::connection();
        //$sql = $db->query("SELECT * FROM users where username = '.$username' and pass = '.$pass'");
        //$respuesta = $db->prepare($sql);

        $sql = "SELECT userId, username, email FROM users WHERE username=:usuario AND pass=:password";
        $respuesta = $db->prepare($sql);
        $respuesta->execute(array(':usuario' => $username, ':password' => $passC));
        $respuesta = $respuesta->fetch(PDO::FETCH_ASSOC);

        if ($respuesta) {
            return new user($respuesta["userId"], $respuesta["username"], $respuesta["email"]);
        }
    }

    public static function createUser($username, $email, $password)
    {
        try {
            $saltedPass = self::crypt($password);
            $db = DBConexion::connection();
            $query = "INSERT INTO users (username, email, pass) VALUES (:username,:email, :pass)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $saltedPass);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    public static function getUserByID($userId)
    {
        try {

            $db = DBConexion::connection();
            $sql = "SELECT * FROM users WHERE userId=?";
            $respuesta = $db->prepare($sql);
            $respuesta->execute(array($userId));
            $respuesta = $respuesta->fetch(PDO::FETCH_ASSOC);
            return $respuesta;
        } catch (PDOException $e) {
            echo "ERROR: " . $e;
        }
    }

}