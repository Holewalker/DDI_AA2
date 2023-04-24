<?php
require_once 'model/topic.php';

class TopicController
{
    private Topic $modelTopic;

    public function __construct()
    {
        $this->modelTopic = new Topic(0, '');
    }


    public function listAllTopics()
    {

        $topics = $this->modelTopic->getTopicList();

        include 'views/topicListIndex.php';

    }

    public function topicDetails()
    {

        if (!isset ($_GET ['id']))
            die("No has especificado un identificador");
        $id = $_GET ['id'];
        //Incluimos el modelo correspondiente

        $topic = $this->modelTopic->getTopicById($id);
        if ($topic == null)
            die('Identificador incorrecto');

        include('views/topicDetails.php');


    }


    public function createTopic()
    {

        include("view/header.php");
        require_once 'view/newTopic.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $this->modelTopic->createTopic($name);
            header("Location: /AA2/index.php");
        }
    }

    public function deleteTopic()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id']))
            $id = $_GET['id'];
        $this->modelTopic->deleteTopicById($id);
        include 'index.php';

    }


}