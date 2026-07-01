<?php
class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $nickname;
    private string $email;
    private string $passwordHash;
    private ?string $image;

    public function __construct(array $data)
    {
        $this->id = (int)$data['id'];
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->nickname = $data['nickname'];
        $this->email = $data['email'];
        $this->passwordHash = $data['password_hash'];
        $this->image = $data['image'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }
}