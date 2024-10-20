<?php
require './db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $fullname = $_POST['fullname'] ?? null; 
    $email = $_POST['email'] ?? null;
    $phonenumber = $_POST['phone'] ?? null; // Изменено на 'phone'
    $password = $_POST['password'] ?? null;
    $confirmPassword = $_POST['confirmPassword'] ?? null; 

    
    // Проверка совпадения паролей
    if ($password !== $confirmPassword) {
        echo "Пароли не совпадают.";
        exit();
    }
    
    // Проверяем, заполнены ли все обязательные поля
    if (empty($fullname) || empty($email) || empty($phonenumber) || empty($password)) {
        echo "Пожалуйста, заполните все обязательные поля.";
        exit();
    }

    // Хэшируем пароль
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Выполнение запроса
    try {
        $stmt = $pdo->prepare("INSERT INTO users (fullname, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $phonenumber, $hashedPassword]);

        // Редирект на страницу логина при успешной регистрации
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        // Сообщение об ошибке, если пользователь уже существует
        if ($e->getCode() == 23000) {
            echo "Пользователь с таким email уже существует.";
        } else {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Регистрация - PinkCar</title>
</head>
<body>
<section class="client">
    <div class="sidelogin">
        <div class="form-lol">
            <form id="registrationForm" method="post">
                <h1> Регистрация </h1>

                <div class="full-input">
                    <input name="fullname" type="text" placeholder=" " />
                    <p> ФИО*</p>
                    <span class="error-message" id="fullnameError">Пожалуйста, введите ваше ФИО.</span>
                </div>
                <div class="full-input">
                    <input name="email" type="email" placeholder=" " />
                    <p> Email*</p>
                    <span class="error-message" id="emailError">Пожалуйста, введите корректный email.</span>
                </div>
                <div class="full-input">
                    <input name="phone" type="tel" id="phoneInput" placeholder=" " />
                    <p> Номер телефона*</p>
                    <span class="error-message" id="phoneError">Пожалуйста, введите номер телефона.</span>
                </div>

                <div class="full-input">
                    <input name="password" type="password" placeholder=" " />
                    <p> Пароль*</p>
                    <span class="error-message" id="passwordError">Пожалуйста, введите пароль.</span>
                </div>

                <div class="full-input">
                    <input name="confirmPassword" type="password" placeholder=" " />
                    <p> Повторите пароль*</p>
                    <span class="error-message" id="confirmPasswordError">Пароли не совпадают.</span>
                </div>

                <div class="checkboxes">
                    <label class="lol-check" for="stayin">
                        Согласие на обработку персональных данных
                        <input type="checkbox" id="stayin" name="stayin" required>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="btn__flex">
                    <button type="submit" id="btn__log">Sign up</button>
                </div>
            </form>
        </div>
    
    <footer>
      <div class="accounts">
       <a class="text" href="login.php">
       Log in to the system </a> 
      <a class="text" href="#">
      Already have an account? </a>
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
        $('#registrationForm').on('submit', function(e) {
            e.preventDefault(); // Отменяем стандартную отправку формы

            // Сбрасываем предыдущие ошибки
            $('.error-message').hide();
            $('.full-input input').removeClass('error');

            let isValid = true;

            // Проверка каждого поля
            const fullname = $('input[name="fullname"]').val();
            if (!fullname) {
                $('#fullnameError').show();
                $('input[name="fullname"]').addClass('error');
                isValid = false;
            }

            const email = $('input[name="email"]').val();
            if (!email) {
                $('#emailError').show();
                $('input[name="email"]').addClass('error');
                isValid = false;
            }

            const phone = $('input[name="phone"]').val();
            if (!phone) {
                $('#phoneError').show();
                $('input[name="phone"]').addClass('error');
                isValid = false;
            }

            const password = $('input[name="password"]').val();
            if (!password) {
                $('#passwordError').show();
                $('input[name="password"]').addClass('error');
                isValid = false;
            }

            const confirmPassword = $('input[name="confirmPassword"]').val();
            if (!confirmPassword) {
                $('#confirmPasswordError').show(); // Показываем ошибку если поле пустое
                $('input[name="confirmPassword"]').addClass('error');
                isValid = false;
            } else if (confirmPassword !== password) {
                $('#confirmPasswordError').text("Пароли не совпадают.").show(); // Если пароли не совпадают
                $('input[name="confirmPassword"]').addClass('error');
                isValid = false;
            }

            // Если всё валидно, отправляем форму
            if (isValid) {
                // Убираем обработчик, чтобы предотвратить зацикливание
                $(this).off('submit');
                this.submit(); // отправляем форму
            }
        });
    });

    $(document).ready(function() {
    // Применяем маску к полю ввода номера телефона
    $('#phoneInput').mask('+7 (999) 999-99-99');
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</body>
</html>