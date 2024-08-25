<?php


use Security\Skeleton\Database\Connection;

require_once __DIR__ . "/vendor/autoload.php";

$connection = Connection::getConnection();
$connection->exec("CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);");

$connection->exec("CREATE TABLE bankAccounts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    total_money INT UNSIGNED DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);");

#password = 123456

$connection->exec('INSERT INTO users (email, password)
    VALUES ("user1@example.com", "$2y$10$I.2CeJzhXWls8WwenJ12aeFlH6AYn3f6BxL13YOYs6pOXG2fJlWpu"),
           ("user2@example.com", "$2y$10$I.2CeJzhXWls8WwenJ12aeFlH6AYn3f6BxL13YOYs6pOXG2fJlWpu");
');

$connection->exec("INSERT INTO bankAccounts (user_id, total_money)
    VALUES (1, 1000),
           (2, 3456)
");