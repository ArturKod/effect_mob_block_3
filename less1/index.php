<?php
declare(strict_types=1);

require_once "app/Database.php";

use App\Database;

try {
    $db = new Database();
    // Задание 1: Установка соединения с БД
    // echo $db->connect() . "\n"; 
    // ✅ "Подключение успешно!"
    
    // Задание 2: Выполнение SELECT-запроса
    //$users = $db->getUsers();
    //print_r($users); 
    // ✅ Выводит массив пользователей из БД
    
    // Задание 3: Добавление данных (INSERT)
    // $db->addUser("Роман", "roma@example.com");
    // print_r($db->getUsers()); 
    // ✅ В списке появился "Иван"
    
    // Задание 4: Защита от SQL-инъекций (Prepared Statements)
    // $db->connect();
    // $db->addUser("Алексей', 'hacked@example.com'); DROP TABLE users; --", "hacker@example.com");  
    // print_r($db->getUsers());
    // ✅ Таблица `users` НЕ удалена

    // Задание 5: Удаление данных (DELETE)
    $db->connect();
    $db->deleteUser(1);
    print_r($db->getUsers());
    // ✅ Пользователь с ID 1 удален
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}