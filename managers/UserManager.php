<?php

class UserManager extends AbstractEntityManager
{
    public function getUserById(int $id): ?User
    {
        $sql = "SELECT * 
                FROM users 
                WHERE id = :id
        ";
        $result = $this->db->query($sql, [
            'id' => $id,
        ]);
        $user = $result->fetch();

        if ($user === false) {
            return null;
        }
        return new User($user);
    }

    public function getUserByNickname(string $nickname): ?User
    {
        $sql = "SELECT * 
                FROM users 
                WHERE nickname = :nickname
        ";
        $result = $this->db->query($sql, [
            'nickname' => $nickname,
        ]);
        $user = $result->fetch();
        if ($user === false) {
            return null;
        }
        return new User($user);
    }

    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * 
                FROM users 
                WHERE email = :email
        ";
        $result = $this->db->query($sql, [
            'email' => $email,
        ]);
        $user = $result->fetch();

        if ($user === false) {
            return null;
        }
        return new User($user);
    }

    public function createUser(string $nickname, string $email, string $passwordHash): int
    {
        $sql = "INSERT INTO users (
                    nickname, 
                    email, 
                    password_hash, 
                    registration_date
                    ) 
                VALUES (
                    :nickname, 
                    :email, 
                    :password_hash, 
                    :registration_date
                    )
        ";
        $this->db->query($sql, [
            'nickname' => $nickname,
            'email' => $email,
            'password_hash' => $passwordHash,
            'registration_date' => date('Y-m-d'),
        ]);
        $userId = (int) $this->db->lastInsertId();
        $source = './assets/images/users/default_user_image.jpg';
        $destination = './assets/images/users/' . $userId . '.jpg';
        if (!copy($source, $destination)) {
            throw new Exception("Impossible de créer l'image par défaut de l'utilisateur.");
        }
        $sql = "UPDATE users 
                SET image = :image 
                WHERE id = :id
        ";
        $this->db->query($sql, [
            'image' => $destination,
            'id' => $userId,
        ]);
        return $userId;
    }

    public function updateUser(int $userId, string $nickname, string $email, string $passwordHash): void
    {
        $sql = "UPDATE users 
                SET nickname = :nickname, 
                    email = :email, 
                    password_hash = :password_hash 
                WHERE id = :id
        ";
        $this->db->query($sql, [
            'id' => $userId,
            'nickname' => $nickname,
            'email' => $email,
            'password_hash' => $passwordHash,
        ]);
    }

    public function updateUserImage(int $userId, string $imagePath): void
    {
        $sql = "UPDATE users 
                SET image = :image 
                WHERE id = :id
        ";
        $this->db->query($sql, [
            'id' => $userId,
            'image' => $imagePath,
        ]);
    }
}
