<?php
session_start(); // Начинаем сессию

// Удаляем все переменные сессии
$_SESSION = [];

// Если используется куки для идентификации сессии, удаляем их
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Завершаем сессию
session_destroy();

// Перенаправляем на страницу входа или главную страницу
header("Location: first.php"); // Замените 'login.php' на нужный вам файл
exit();

?>