<?php
require_once("ddbb/conexionheader.php");

class message
{
public int $messageId;
public String $message;
public int $userId;
public int $postId;
public int $previousMessageId;
    public PDO $db;

    /**
     * @param int $messageId
     * @param int $message
     * @param int $userId
     * @param int $postId
     * @param int $previousMessageId
     */
    public function __construct(int $messageId, int $message, int $userId, int $postId, int $previousMessageId)
    {
        $this->messageId = $messageId;
        $this->message = $message;
        $this->userId = $userId;
        $this->postId = $postId;
        $this->previousMessageId = $previousMessageId;
        $this->db = DBConexion::connection();

    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return int
     */
    public function getMessage(): int
    {
        return $this->message;
    }

    /**
     * @param int $message
     */
    public function setMessage(int $message): void
    {
        $this->message = $message;
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
     * @return int
     */
    public function getPreviousMessageId(): int
    {
        return $this->previousMessageId;
    }

    /**
     * @param int $previousMessageId
     */
    public function setPreviousMessageId(int $previousMessageId): void
    {
        $this->previousMessageId = $previousMessageId;
    }

}