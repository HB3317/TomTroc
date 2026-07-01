<?php
class Book
{
    private int $id;
    private int $userId;
    private string $title;
    private string $author;
    private string $image;
    private string $description;
    private string $status;

    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? (int)$data['id'] : -1;
        $this->userId = (int)$data['user_id'];
        $this->title = $data['title'];
        $this->author = $data['author'];
        $this->image = $data['image'];
        $this->description = $data['description'];
        $this->status = $data['status'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}