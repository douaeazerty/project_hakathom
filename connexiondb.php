<?php
$dsn = 'mysql:host=localhost;';
$username = 'root';
$password = '';
$dbhack = "hackathonDb";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db -> prepare("CREATE DATABASE IF NOT EXISTS $dbhack") -> execute();
    $stmt = $db -> prepare("USE $dbhack") -> execute();
    $stmt = $db -> prepare("CREATE TABLE IF NOT EXISTS users(
        id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL
    )") -> execute();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}