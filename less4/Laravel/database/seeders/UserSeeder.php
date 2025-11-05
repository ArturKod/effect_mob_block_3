<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Задание 4: Создание сидера для заполнения таблицы пользователями
        // Задача:
        //  Создать UserSeeder, который добавляет 5 тестовых пользователей в users.
        // $users = [
        //     [
        //         'name' => 'Admin',
        //         'role' => 'admin',
        //         'email' => 'admin2@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => 'UserTest',
        //         'role' => 'user',
        //         'email' => 'admin3@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => 'user123',
        //         'role' => 'user',
        //         'email' => 'admin33@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => 'testUser',
        //         'role' => 'user',
        //         'email' => 'admin222@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => 'NewAdmin',
        //         'role' => 'admin',
        //         'email' => 'admin1111@example.com',
        //         'password' => Hash::make('password'),
        //     ]
        // ];

        // DB::table('users')->insert($users);

        // Задание 5: Заполнение БД фабриками (Eloquent Factory)
        // Задача:
        //  Использовать UserFactory, чтобы создать 10 фейковых пользователей.
        
        User::factory(10)->create();
    }
}
