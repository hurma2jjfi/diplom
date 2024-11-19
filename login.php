<?php
require './db/db.php';

session_start(); // Начинаем сессию

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
        $_SESSION['user_id'] = $user['id'];

        // Если пользователь выбрал запомнить меня
        if (isset($_POST['stayin'])) {
            // Генерируем новый токен
            $token = bin2hex(random_bytes(16));

            // Сохраняем токен в базе данных
            $stmt = $pdo->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
            $stmt->execute(['token' => $token, 'id' => $user['id']]);

            // Устанавливаем куки на 30 дней
            setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), "/");
        } else {
            // Удаляем куки, если они были установлены ранее
            setcookie('remember_me', '', time() - 3600, "/");

            // Удаляем токен из базы данных
            $stmt = $pdo->prepare("UPDATE users SET remember_token = NULL WHERE id = :id");
            $stmt->execute(['id' => $user['id']]);
        }

        echo json_encode(['success' => true]);
        exit();
    } else {
        echo json_encode(['error' => 'Неверный email или пароль.']);
        exit();
    }
}

// При загрузке страницы проверяем наличие куки и аутентифицируем пользователя
if (isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];

    // Проверяем токен в базе данных
    $stmt = $pdo->prepare("SELECT * FROM users WHERE remember_token = :token LIMIT 1");
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Если токен найден, создаем сессию
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
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
        e.preventDefault(); // Prevent default form submission
        $('#messageContainer').hide(); // Hide message container
        
        // Reset styles for inputs
        $('input[name="username"], input[name="password"]').css('border', '');

        // Validate inputs
        let isValid = true;
        const username = $('input[name="username"]').val().trim();
        const password = $('input[name="password"]').val().trim();

        if (username === '') {
            $('input[name="username"]').css('border', '1px solid red'); // Highlight empty username
            isValid = false;
        }

        if (password === '') {
            $('input[name="password"]').css('border', '1px solid red'); // Highlight empty password
            isValid = false;
        }

        // If inputs are not valid, show message and exit
        if (!isValid) {
            $('#messageText').text('Пожалуйста, заполните все поля.');
            $('#messageContainer').removeClass('success-message').addClass('error-message');
            $('#messageContainer').show(); // Show message container
            return; // Exit the function early
        }

        $.ajax({
            url: '', // Send to the same file
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // If login is successful, redirect to the main page
                    window.location.href = 'glav.php'; // Redirect after successful login
                } else if (response.error) {
                    $('#messageText').text(response.error);
                    $('#messageContainer').removeClass('success-message').addClass('error-message');
                    $('#messageContainer').show(); // Show message container
                    
                    // Check which fields caused the error
                    if (response.fields) {
                        response.fields.forEach(field => {
                            $('input[name="' + field + '"]').css('border', '2px solid red');
                        });
                    }
                }
            },
            error: function() {
                $('#messageText').text('Произошла ошибка при отправке формы. Попробуйте еще раз.');
                $('#messageContainer').removeClass('success-message').addClass('error-message');
                $('#messageContainer').show(); // Show message container
            }
        });
    });
});



</script>
</body>
</html>