<?php
session_start();
$host = 'localhost'; 
$dbname = 'dip'; 
$username = 'root';
$password = ''; 

try {
    // Создание соединения с базой данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Установка режима ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

// Получение данных из формы
$id_car = $_POST['id_car'];
$id_user = $_POST['id_user'];
$rating = $_POST['rating'];
$review = $_POST['review'];

try {
    // Подготовка и выполнение SQL-запроса
    $stmt = $pdo->prepare("INSERT INTO reviews (id_car, id_user, rating, review) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_car, $id_user, $rating, $review]);

    echo "Спасибо, мы непременно учтём ваш отзыв!";
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
