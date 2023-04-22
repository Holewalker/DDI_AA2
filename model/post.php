<?php
require_once("ddbb/conexionheader.php");

class post
{
    public int $postId;
    public string $title;
    public string $message;
    public int $topicId;
    public int $userId;

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
    }
}