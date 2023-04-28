<?php
require_once '../model/user.php';
require_once '../model/sesion.php';


class User_Controller
{
    private User $modelUser;
    private Session $session;

    public function __construct()
    {
        $this->modelUser = new User(0, '', '');
        $this->session = new Session();
    }


    public function createUser($username, $email, $pass)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->modelUser->createUser($username, $email, $pass);
            //header("Location: /AA2/index.php");
        }
    }

    public function checkUser($username, $pass)
    {

        $this->session->set("username", $this->modelUser->checkCredentials($username, $pass));

        header("Location: /AA2/index.php");

    }


    public function endSession()
    {
        $this->session->borrar_sesion();
        header("Location: /AA2/index.php");
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