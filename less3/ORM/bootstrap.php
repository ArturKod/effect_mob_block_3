<?php
require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$paths = [__DIR__ . '/app/Entities'];
$isDevMode = true;

$config = ORMSetup::createAttributeMetadataConfiguration(
    $paths, 
    $isDevMode
);

$conn = [
    'dbname'   => 'test_db',
    'user'     => 'root', 
    'password' => 'root',
    'host'     => 'localhost',
    'driver'   => 'pdo_mysql',
    'port'     => 3306,
    'charset'  => 'utf8mb4',
];

try {
    $connection = DriverManager::getConnection($conn, $config);
    $entityManager = new EntityManager($connection, $config);
    
    $connection->executeQuery('SELECT 1');
    
    return $entityManager;
} catch (\Exception $e) {
    echo "Ошибка подключения к БД: " . $e->getMessage() . "\n";
    exit(1);
}