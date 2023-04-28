<?php
require_once('../model/message.php');
require_once('../controller/user_controller.php');

class MessageController
{

    public function __construct()
    {
    }


    public function listAllMessagesByPostId($postId)
    {
        $messages = message::getMessagesByPostId($postId);

        return $messages;
//        include 'views/messageListIndex.php';
    }

    public function messageDetails()
    {

        if (!isset ($_GET ['id']))
            die("No has especificado un identificador");
        $id = $_GET ['id'];
        //Incluimos el modelo correspondiente

        $message = $this->modelMessage->getMessageById($id);
        if ($message == null)
            die('Identificador incorrecto');

        include('views/messageDetails.php');


    }


    public function createMessage()
    {

        include("view/header.php");
        require_once 'view/newMessage.php';
        if ($_SERVER["REQUEST_METHOD"] == "MESSAGE") {
            $name = $_POST["name"];
            $this->modelMessage->createMessage($name);
            header("Location: /AA2/index.php");
        }
    }

    public function deleteMessage()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id']))
            $id = $_GET['id'];
        $this->modelMessage->deleteMessageById($id);
        include 'index.php';

    }


}

$controller = new MessageController();
$userController = new User_controller();

if (isset($_GET['id'])) {
    $messages = $controller->listAllMessagesByPostId($_GET['id']);
}




