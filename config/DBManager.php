<?php

class DBManager
{
    private static ?DBManager $instance = null;
    private PDO $db;

    private function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function getInstance(): DBManager
    {
        if (self::$instance === null) {
            self::$instance = new DBManager();
        }
        return self::$instance;
    }

    public function getPDO(): PDO
    {
        return $this->db;
    }

    public function query(string $sql, ?array $params = null): PDOStatement
    {
        if ($params === null) {
            $query = $this->db->query($sql);
        } else {
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }
        return $query;
    }

    public function lastInsertId(): int
    {
        return (int) $this->db->lastInsertId();
    }
}
