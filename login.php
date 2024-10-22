<?php
require './db/db.php';

session_start(); // Начинаем сессию

// Проверяем, был ли отправлен запрос на вход
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Проводим базовую валидацию
    if (empty($username) || empty($password)) {
        echo json_encode(['error' => 'Пожалуйста, заполните все поля.']);
        exit();
    }

    // Подключаемся к базе данных
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Проверяем, существует ли пользователь и соответствует ли пароль
    if ($user && password_verify($password, $user['password'])) {
        // Успешный вход: сохраняем информацию о пользователе в сессии
        $_SESSION['user_id'] = $user['id']; // Или другое уникальное поле, например, email
        echo json_encode(['success' => true]); // Отправляем успешный ответ
        exit();
    } else {
        echo json_encode(['error' => 'Неверный email или пароль.']);
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Авторизация - PinkCar</title>
</head>
<body>
<section class="client">
  <div class="sidelogin">
    <div class="form-lol">
       <form id="loginForm" method="post"> 
         <h1> ВХОД </h1>
         
         <div class="full-input">
           <input name="username" type="text" placeholder=" "/>
           <p> Email*</p>
           <span class="error-message" id="usernameError">Пожалуйста, введите ваш email.</span> <!-- Изменен id -->
         </div>
         <div class="full-input">
           <input name="password" type="password" placeholder=" "/>
           <p> Пароль*</p>
           <span class="error-message" id="passwordError">Пожалуйста, введите ваш пароль.</span> <!-- Изменен id -->
         </div>
         
         <div class="checkboxes">
             <label class="lol-check" for="stayin">
Запомнить меня
  <input type="checkbox" id="stayin" name="stayin">
      <span class="checkmark"></span>
    </label>
</div>
<div class="btn__flex">
         <button type="submit" id="btn__log">Log in</button></div> <!-- Добавлен type="submit" -->
      </form>
    </div>
    <div id="messageContainer" class="message-container">
    <div id="messageText"></div>
</div>
    <footer>
      <div class="accounts">
       <a class="text" href="register.php">
         Create account </a> 
      <a class="text" href="#">
         Can't sign in? </a>
      </div>
      <div class="version">
        v 1.1.0
      </div>
    </footer>
  </div>
  <div class="launcherart">
    <div class="navmenu">
      <div class="item minus">
        <i class='bx bx-minus' ></i>
      </div>
      <div class="item gear">
        <i class='bx bx-cog' ></i></div>
      <div class="item infos">
        <i class='bx bx-question-mark' ></i>
      </div>
      <div class="item close"><i class='bx bx-x'></i></div>
    </div>
  </div>
</section>




<script>
$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // предотвращение стандартной отправки формы
        $('#messageContainer').hide(); // скрываем контейнер сообщений
        
        $.ajax({
            url: '', // Отправляем на тот же файл
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Если вход успешный, перенаправляем на главную страницу
                    window.location.href = 'glav.php'; // Перенаправляем после успешного входа
                } else if (response.error) {
                    $('#messageText').text(response.error);
                    $('#messageContainer').removeClass('success-message').addClass('error-message');
                    $('#messageContainer').show(); // Показываем контейнер сообщений
                }
            },
            error: function() {
                $('#messageText').text('Произошла ошибка при отправке формы. Попробуйте еще раз.');
                $('#messageContainer').removeClass('success-message').addClass('error-message');
                $('#messageContainer').show(); // Показываем контейнер сообщений
            }
        });
    });
});




</script>
</body>
</html>