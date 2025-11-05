<?php
require_once 'database.php';
require_once 'bootstrap.php';

use App\Models\User as EloquentUser;
use App\Models\Post;
use App\Entities\User as DoctrineUser;
use App\Entities\Post as DoctrinePost;

try {

    // Задание 1: Создание модели (Eloquent)
    // $user = new User();
    // $user->name = "Иван";
    // $user->email = "ivan555@example.com";
    // $user->password = "secret";
    // $user->save();
    
    // echo "Данные сохранены в базе";


    // Задание 2: Работа с отношениями (Eloquent)
    // $post = new Post();
    // $post->title = "Мой первый пост";
    // $post->content = "Это содержание моего первого поста";
    // $post->user_id = 3;
    // $post->save();

    // echo 'пост создан!';
    // $post = Post::find(1);
    // echo $post->user->name;
    // ✅ Выводит имя автора поста


    // Задание 3: Doctrine – создание сущности
    // $user = new DoctrineUser();
    // $user->setName("Анна");
    // $user->setEmail("anna@example.com");
    // $entityManager->persist($user);
    // $entityManager->flush(); 
    // ✅ Пользователь добавлен в БД

    // Задание 4: Использование репозитория (Doctrine)
    // $userRepository = $entityManager->getRepository(DoctrineUser::class);
    // $user = $userRepository->findByEmail("anna@example.com");
    // print_r($user); 
    
    // Задание 5: Отношения между сущностями (Doctrine)
    // $post = $entityManager->getRepository(DoctrinePost::class)->find(1);
    // echo $post->getUser()->getName();  
    // ✅ Выводит имя автора поста
} catch (Exception $e) {
    echo "Ошибка: {$e->getMessage()}\n";
}