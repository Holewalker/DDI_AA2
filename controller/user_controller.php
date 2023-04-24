<?php
require_once 'model/user.php';
require_once 'model/sesion.php';


class User_Controller
{
    private User $modelUser;
    private Session $session;

    public function __construct()
    {
        $this->modelUser = new User(0, '');
        $this->session = new Session();
    }


    public function createUser()
    {
        include("view/header.php");
        require_once 'view/newUser.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->modelUser->createUser();
            header("Location: /AA2/index.php");
        }
    }

    public function checkUser()
    {

        include("view/header.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            $this->modelUser->checkCredentials($username, $pass);
            $this->session->set($this->modelUser['username'], $this->modelUser['username']);
            header("Location: /AA2/index.php");
        }
    }


    public function endSession()
    {
        $this->session->borrar_sesion();
        header("Location: /AA2/index.php");
    }


}