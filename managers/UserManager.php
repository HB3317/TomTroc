<?php
class UserManager extends AbstractEntityManager
{
    public function getUserById(int $id): ?User
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();

        if ($user === false) {
            return null;
        }

        return new User($user);
    }

    public function getUserByNickname(string $nickname): ?User
    {
        $sql = "SELECT * FROM users WHERE nickname = :nickname";
        $result = $this->db->query($sql, ['nickname' => $nickname]);
        $user = $result->fetch();

        if ($user === false) {
            return null;
        }

        return new User($user);
    }

    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();

        if ($user === false) {
            return null;
        }

        return new User($user);
    }

    public function createUser(string $nickname, string $email, string $passwordHash): void
    {
        $sql = "INSERT INTO users (nickname, email, password_hash) VALUES (:nickname, :email, :password_hash)";
        $this->db->query($sql, [
            'nickname' => $nickname,
            'email' => $email,
            'password_hash' => $passwordHash
        ]);
    }
}