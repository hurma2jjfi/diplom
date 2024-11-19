<?php
require './db/db.php'; 
session_start();

// Проверка, залогинен ли пользователь
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Перенаправление на страницу логина
    exit;
}

$userId = $_SESSION['user_id'];

// Запрос на получение забронированных заказов для текущего пользователя
$stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = :user_id");
$stmt->execute(['user_id' => $userId]);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Подключение к пользовательскому интерфейсу
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./reservations.css"> <!-- Добавьте свой CSS файл для стилей -->
    <title>Мои заказы</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="glav.php">Главная</a></li>
            <li><a href="reservations.php">Мои заказы</a></li>
            <li><a href="logout.php">Выйти</a></li>
        </ul>
    </nav>
</header>

<main>
    <h1>Мои забронированные автомобили</h1>
    <?php if (count($reservations) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Автомобиль</th>
                    <th>Дата бронирования</th>
                    <th>Дата сдачи</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservation['total_price']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['image']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['name']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['end_date']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['status']); ?></td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>У вас пока нет забронированных автомобилей.</p>
    <?php endif; ?>
</main>

<footer>
    <p>&copy; 2023 Ваш сайт проката автомобилей</p>
</footer>
</body>
</html>