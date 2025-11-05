<?php

declare(strict_types=1);

namespace App;

use PDO;
use PDOException;

class Database
{
    private ?PDO $pdo = null;

    private string $host = 'localhost';
    private int $port = 3306;
    private string $db = 'test_db';
    private string $username = 'root';
    private string $password = 'root';

    public function connect(): string
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db};charset=utf8mb4", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return "Подключение успешно!";
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }

    public function getUsers(): array
    {
        if ($this->pdo === null) {
            throw new PDOException("Нет подключения к БД. Сначала вызовите connect()");
        }

        try {
            $stmt = $this->pdo->query("SELECT * FROM users");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        } catch (PDOException $e) {
            die("Ошибка получения пользователей: " . $e->getMessage());
        }
    }

    public function addUser($name, $email): void
    {
        if ($this->pdo === null) {
            throw new PDOException("Нет подключения к БД. Сначала вызовите connect()");
        }

        try {
            $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'name' => "$name",
                'email' => "$email"
            ]);
        } catch (PDOException $e) {
            die("Ошибка добавления пользователя: " . $e->getMessage());
        }
    }

    public function deleteUser($id): void
    {
        if ($this->pdo === null) {
            throw new PDOException("Нет подключения к БД. Сначала вызовите connect()");
        }

        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

        } catch (PDOException $e) {
            die("Ошибка удаления пользователя: " . $e->getMessage());
        }
    }
}
