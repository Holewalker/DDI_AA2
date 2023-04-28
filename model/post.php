<?php
require_once('../ddbb/DBConexion.php');
require_once('topic.php');
require_once('user.php');
class post
{
    public int $postId;
    public string $title;
    public string $message;
    public int $topicId;
    public int $userId;
    public PDO $db;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @param int $postId
     * @param string $title
     * @param string $message
     * @param int $topicId
     * @param int $userId
     */
    public function __construct(int $postId, string $title, string $message, int $topicId, int $userId)
    {
        $this->postId = $postId;
        $this->title = $title;
        $this->message = $message;
        $this->topicId = $topicId;
        $this->userId = $userId;
        $this->db = DBConexion::connection();
    }

    function getPostList()
    {
        try {
            $res = $this->db->query('SELECT * FROM posts');
            $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    function getPostById($postId)
    {
        try {

            $res = $this->db->query('SELECT * FROM posts WHERE postId = ?');
            $res->execute(array($postId));
            return $res->fetch();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }


    function createPost(Topic $topic, User $user)
    {
        try {
            $topicId = $topic->getTopicId();
            $userId = $user->getUserId();
            $query = "INSERT INTO posts (title,message,topicId,userId) VALUES (:title,:message,:topicID,:userId)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':topicId', $topicId);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
            return $this->db->lastInsertId();

        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    function deletePostById($postId)
    {
        try {
            $query = "DELETE FROM posts where postId = :postId";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }

    function updatePostById()
    {
        //oneline disabler
        //  if (true){return false;}

        try {
            $result = $this->db->prepare('UPDATE posts SET message=:message WHERE postId=:postId');
            $result->bindParam(':postId', $_POST['postId']);
            $result->bindParam(':message', $_POST['message']);
            $result->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        return false;
    }


}