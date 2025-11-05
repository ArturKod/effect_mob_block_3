<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'password' => 'admin123'],
            ['name' => 'Ivan', 'email' => 'ivan@mail.com', 'password' => 'efqffqwef'],
            ['name' => 'Kolya', 'email' => 'kolya@mail.com', 'password' => 'qwfqwfwwfwfff'],
            ['name' => 'Artur', 'email' => 'artur@mail.com', 'password' => 'ffffffffff'],
            ['name' => 'Juliya', 'email' => 'juliya@mail.com', 'password' => 'saraee33e21h123'],
        ];

        foreach ($users as $userData) {
            $user = new User();
            $user->setName($userData['name']);
            $user->setEmail($userData['email']);        
            $user->setPassword(password_hash($userData['password'], PASSWORD_DEFAULT));;
            
            $manager->persist($user);
        }

        $manager->flush();
    }
}
