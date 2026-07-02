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
}