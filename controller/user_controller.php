<?php
require_once('../model/user.php');
require_once('../model/sesion.php');


class User_Controller
{

    public function __construct()
    {

    }


    public function createUser($username, $email, $pass): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            User::createUser($username, $email, $pass);
        }
    }

    public function checkUser($username, $pass)
    {
        return user::checkCredentials($username, $pass);

    }


    public function endSession()
    {
        Session::borrar_sesion();
        header("Location: /AA2/index.php");
    }

    public function getUserById($userId)
    {
        return user::getUserByID($userId);
    }

}

//end class
$campo = null;
$validacion = true;
$controlador = new User_Controller();
if (isset($_GET["endSession"])) {
    $controlador->endSession();
}


require_once("userForms/user_login.php");
require_once("userForms/user_register.php");