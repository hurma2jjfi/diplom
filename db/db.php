<?php

$host = 'localhost'; // Хост базы данных (обычно localhost)
$dbname = 'dip'; // Имя вашей базы данных
$username = 'root'; // Имя пользователя базы данных
$password = ''; // Пароль пользователя базы данных

try {
    // Создание соединения с базой данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Установка режима ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>