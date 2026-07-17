<?php

class User
{
    private int $id;
    private string $nickname;
    private string $email;
    private string $passwordHash;
    private ?string $image;
    private string $registrationDate;

    public function __construct(array $data)
    {
        $this->id = (int) $data['id'];
        $this->nickname = $data['nickname'];
        $this->email = $data['email'];
        $this->passwordHash = $data['password_hash'];
        $this->image = $data['image'];
        $this->registrationDate = $data['registration_date'];
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }

    public function getRegisteredSince(): int
    {
        $registrationDate = new DateTime($this->getRegistrationDate());
        $today = new DateTime();
        $registeredSince = $today->diff($registrationDate);
        return $registeredSince->y;
    }
}
