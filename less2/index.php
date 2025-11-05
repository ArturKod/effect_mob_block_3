<?php
declare(strict_types=1);

require_once "app/Database.php";

use App\Database;

try {
    $db = new Database();
    $db->connect();

    // Задание 1: Использование подготовленных запросов (prepare, execute)
    // print_r($db->getUserByEmail("ivan@example.com"));
    // ✅ Выводит данные пользователя

    // $db->getUserByEmail("hacker@example.com' OR 1=1 --");  
    // ✅ Не должно возвращать всех пользователей

    // Задание 2: Безопасное добавление данных (INSERT)
    // $db->addUser("Алексей', 'hacked4@example.com'); DROP TABLE users; --", "hacker4@example.com", "123456");  
    // print_r($db->getUsers());  
    // ✅ Таблица `users` НЕ удалена


    // Задание 3: Безопасное удаление данных (DELETE)
    // $db->deleteUser("2 OR 2=2");  
    // print_r($db->getUsers());  
    // ✅ Удаляется только пользователь с ID 1, а не все записи

    // Задание 4: Экранирование данных (bindParam, bindValue)
    // $db->addUser("Oleg", "oleg@example.com", "password");
    // print_r($db->getUserByEmail("oleg@example.com"));  
    // ✅ Пользователь найден, SQL-инъекция невозможна

    // Задание 5: Ограничение ввода данных (валидация)
    // $db->getUserByEmail("неправильный_адрес");  
    // ✅ Должна быть ошибка "Неверный формат email

} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}