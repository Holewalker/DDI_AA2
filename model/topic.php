<?php
require_once("ddbb/DBConexion.php");

class topic
{
    public int $topicId;
    public string $name;
    public $db;

    /**
     * @param int $topicId
     * @param string $name
     */
    public function __construct(int $topicId, string $name)
    {
        $this->topicId = $topicId;
        $this->name = $name;
        $this->db = DBConexion::connection();
    }

    /**
     * @return int
     */
    public function getTopicId(): int
    {
        return $this->topicId;
    }

    /**
     * @param int $topicId
     */
    public function setTopicId(int $topicId): void
    {
        $this->topicId = $topicId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    function getTopicList()
    {
        try {
            $res = $this->db->query('SELECT * FROM topics');
            $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    function getTopicById($topicId)
    {
        try {

            $res = $this->db->query('SELECT * FROM topics WHERE topicId = ?');
            $res->execute(array($topicId));
            return $res->fetch();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    function createTopic()
    {
        try {
            $query = "INSERT INTO topics (name) VALUES (:name)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return $this->db->lastInsertId();

        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    function deleteTopicById($topicId)
    {
        try {
            $query = "DELETE FROM topics where topicId = :topicId";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':topicId', $topicId, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    function updateTopicById($topicId)
    {
        try {
            $result = $this->db->prepare('UPDATE topics SET name=:name WHERE topicId=:topicId');
            $result->bindParam(':topicId', $_POST['topicId']);
            $result->bindParam(':name', $_POST['name']);
            $result->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }


}