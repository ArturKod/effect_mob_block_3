<?php
require_once __DIR__ . '/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

try {
    if (!Capsule::schema()->hasTable('posts')) {
        Capsule::schema()->create('posts', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        echo "Таблица 'posts' создана успешно!\n";
    } else {
        echo "Таблица 'posts' уже существует\n";
    }
} catch (Exception $e) {
    echo "Ошибка создания таблицы: " . $e->getMessage() . "\n";
}