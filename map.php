<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Карта</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="map.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
</head>
<body>
    <div class="car-map">
        <div class="center">
        <div class="loading" id="loading">
            <div class="loader"></div>
            <div class="loader"></div>
            <div class="loader"></div>
        </div></div>
        <div id="map" class="map" style="display: none;"></div>
        <div class="car-info" id="car-info" style="display: none;">
            <h3>Информация о автомобиле</h3>
            <p><strong>Модель:</strong> <span id="car-name"></span></p>
            <p><strong>Статус:</strong> <span id="car-status"></span></p>
            <p><strong>Цена за час:</strong> <span id="car-price"></span> <span id="currency"></span></p>
        </div>
    </div>
    <a id="car-link" href="glav.php" style="display: none;">Назад к каталогу</a>

<script src="map.js"></script>
</body>
</html>
