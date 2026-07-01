<?php
class Message extends AbstractEntity
{
    private int $id;
    private int $senderId;
    private int $receiverId;
    private string $content;
    private string $dateTime;
    private int $isRead;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = (int)$data['id'];
        $this->senderId = (int)$data['sender_id'];
        $this->receiverId = (int)$data['receiver_id'];
        $this->content = $data['content'];
        $this->dateTime = $data['date_time'];
        $this->isRead = (int)$data['is_read'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getDateTime(): string
    {
        return $this->dateTime;
    }

    public function getIsRead(): bool
    {
        return (bool)$this->isRead;
    }

}