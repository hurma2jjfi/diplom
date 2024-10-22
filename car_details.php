<?php
require './db/db.php'; // Подключаем файл базы данных

// Проверяем, был ли передан id через GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $carId = $_GET['id'];

    // Подготовка SQL запроса для получения информации об автомобиле
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE id_car = :id");
    $stmt->execute(['id' => $carId]);

    // Получение данных о конкретном автомобиле
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Если id не передан, перенаправляем на список автомобилей
    header('Location: glav.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($car['name']) . " - " ?>Детали автомобиля</title>
</head>
<body>


    <h1><?php echo htmlspecialchars($car['name']); ?></h1>
    <p><strong>Модель:</strong> <?php echo htmlspecialchars($car['type']); ?></p>
    <p><strong>Год выпуска:</strong> <?php echo htmlspecialchars($car['year']); ?></p>
    <p><strong>Цена:</strong> <?php echo htmlspecialchars($car['price']); ?> руб.</p>
    <img src="<?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['name']); ?>" style="max-width:300px;"/>
    <button onclick="location.href='glav.php'">Назад</button>


</body>
</html>