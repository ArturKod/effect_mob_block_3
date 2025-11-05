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

    public function addUser(string $name, string $email, string $password): void
    {
        if ($this->pdo === null) {
            throw new PDOException("Нет подключения к БД. Сначала вызовите connect()");
        }

        try {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->pdo->prepare($sql);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password_hash, PDO::PARAM_STR);

            $stmt->execute();
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
            $id = (int)$id;

            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

        } catch (PDOException $e) {
            die("Ошибка удаления пользователя: " . $e->getMessage());
        }
    }

    public function getUserByEmail(string $email): array|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        
        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        if (!$email_validate) {
            die("Неверный формат email");
        }

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        return $user = $stmt->fetch();
    }
}
