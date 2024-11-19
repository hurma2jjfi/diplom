<?php
require './db/db.php'; // Подключаем файл с настройками базы данных

try {
    // SQL запрос для получения данных из таблицы reviews с объединением с таблицами cars и users
    $sql = "SELECT reviews.id, 
                   reviews.rating, 
                   reviews.review, 
                   reviews.created_at, 
                   cars.name AS car_name, 
                   users.fullname AS user_name 
            FROM reviews 
            JOIN cars ON reviews.id_car = cars.id_car  
            JOIN users ON reviews.id_user = users.id 
            ORDER BY reviews.created_at DESC";
    
    // Подготовка и выполнение запроса
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="first.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Каршеринг - PinkCar</title>
</head>
<body>
<header class="header">
        <nav class="navigation">
             <ul class="ul__wrapper">
              <div class="logo__item">
              <div class="logo__img"><a id="logo" href="#"><img width="112" height="64" src="./image/Group 248 (1).png" alt=""></a></div>
              </div>
              
              <div class="li__item">
                <li class="nav-item"><a href="#">Автомобили</a></li>
                <li class="nav-item"><a href="#">Тарифы</a></li>
                <li class="nav-item"><a href="#">Условия</a></li>
                <li class="nav-item"><a href="#">Юридическим лицам</a></li>
                <li class="nav-item"><a href="#">Контакты</a></li>
                <div id="btn"><a id="r" href="register.php">Регистрация</a></div>
              </div>
            </ul>
        </nav>
    </header>
<div class="blur__center">
<div class="background__blur"></div></div>
<div id="flex__title">
<h1 id="title__txt">Делитесь, арендуйте,<br> путешествуйте. <br> Удобный каршеринг.</h1>
</div>
<div class="center__blk">
<div id="flex__title__tw">
<h3 id="title__txt__tw">ВОТ МАШИНЫ В ВАШЕМ ГОРОДЕ — </h3>
</div>
<div class="select__wrapper">
<div class="select-wrapper">
    <div class="custom-select" id="customSelect">
        <span id="sl__city">Выберите город</span>
        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#fff">
            <path d="M7 10l5 5 5-5H7z"/>
        </svg>
    </div>
    <div class="options" id="options">
        <div class="option" data-value="astrahan">Астрахань</div>
        <div class="option" data-value="moscow">Москва</div>
        <div class="option" data-value="spb">Санкт-Петербург</div>
    </div>
</div>
</div>
</div>
<div class="center__cont">
<div class="carousel">
    <div class="container__reklam__first" id="carousel">
        <div class="dd"><div class="container__inner"><img src="./image/image 34.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 35.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
        <div class="dd"><div class="container__inner"><img src="./image/image 36.png"><h3 id="inner">Renault Duster</h3></div></div>
    </div>
</div>
</div>

<div class="onboard__title">
<h1 class="j">ОНБОРДИНГ</h1>    
</div>


<div class="cont__cent">
    <div class="container__reklam__second">
        <div class="tabs">
            <ul class="tab-links">
                <li class="active"><a id="tb" href="#tab1">Парковка</a></li>
                <li><a id="tb"  href="#tab2">Мир штрафов</a></li>
                <li><a id="tb"  href="#tab3">Всё застраховано</a></li>
                <li><a id="tb"  href="#tab4">Другие вопросы</a></li>
                <li><a id="tb"  href="#tab5">Подписка</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <div class="flex__container__car">
                        <div class="container__inner__car">
                            <img src="./image/orig.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Парковаться нужно на городских парковках</h3>
                            <p id="park__desc">они бесплатные</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/Frame 14.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Только правильная парковка</h3>
                            <p id="park__desc">на открытых платных и бесплатных парковках под вот таким знаком</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/Frame 14 (2).png" id="flex__image__car" alt="">
                            <h3 id="park__tit">За шлагбаумом нельзя!</h3>
                            <p id="park__desc">иначе следующий водитель не сможет забрать машину</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/image 8466.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Ездить же можно по всем областям</h3>
                            <p id="park__desc">и даже дальше</p>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab">
                <div class="flex__container__car">
                        <div class="container__inner__car">
                            <img src="./image/Frame 14 (3).png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Мусор и курение</h3>
                            <p id="park__desc">причём, чего угодно, даже электронных сигарет</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/Frame 16 (1).png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Животные без переноски</h3>
                            <p id="park__desc">на руках нельзя, на полу тоже, на сидении тем более</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/image 8470.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Слишком большие предметы</h3>
                            <p id="park__desc">для такого есть фургоны</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/Frame 17.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Плохая<br> парковка</h3>
                            <p id="park__desc">на газоне, на тротуаре и везде, <br> что не парковка</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/Frame 18.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Буксировка</h3>
                            <p id="park__desc">нам наши бампера очень дороги</p>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab">
                <div class="flex__container__car">
                        <div class="container__inner__car">
                            <img src="./image/osago (2).png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Есть КАСКО и ОСАГО</h3>
                            <p id="park__desc">полисы электронные, и они в приложении</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/dps.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Главное  — оформить любое ДТП с ГИБДД</h3>
                            <p id="park__desc">только в этом случае сработает страховка</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/strahov.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Жизнь и здоровье застрахованы </h3>
                            <p id="park__desc">причём, и водителя, и пассажиров</p>
                        </div>
                        <div class="container__inner__car">
                        <img src="./image/polo.png" id="flex__image__car" alt="">
                            <h3 id="park__tit">Поцарапали Polo на сумму 55 000 ₽</h3>
                            <p id="park__desc">c франшизой виновника вы заплатите лишь 40 000 ₽, а остальное — страховая</p>
                        </div>
                    </div>
                </div>
                <div id="tab4" class="tab">
                <div class="faq-container" id="faqContainer"></div> 
                </div>
                <div id="tab5" class="tab">
    <div class="subscription-container">
        <h3 class="subscription-title">Подписка PinkCar Premium:</h3>
        <p class="subscription-price">Ежемесячная плата: <strong>50.000₽</strong></p>
        <h3 class="substract__zagol">Преимущества подписки:</h3>
        <div class="subscription-benefits">
            <div class="benefit-item">— Бесплатная доставка автомобиля на указанный адрес.</div>
            <div class="benefit-item">— Безлимитный пробег.</div>
            <div class="benefit-item">— Приоритетное обслуживание клиентов.</div>
            <div class="benefit-item">— Включенное страхование автомобиля на весь срок аренды.</div>
            <div class="benefit-item">— Скидки до 20% на дополнительные услуги.</div>
            <div class="benefit-item">— Доступ к эксклюзивным автомобилям премиум-класса.</div>
            <div class="benefit-item">— Гибкость в изменении бронирования без штрафов.</div>
            <div class="benefit-item">— Программа лояльности с накоплением баллов.</div>
            <div class="benefit-item">— Интерактивное мобильное приложение для управления бронированиями.</div>
        </div>
        <button class="subscribe-button">Оформить</button>
    </div>
</div>
            </div>
        </div>
    </div>
</div>



<div class="why__title">
<h1 class="j">ПОЧЕМУ КАРШЕРИНГ?</h1>    
</div>
<div class="cont__cent__th">
    <div class="container__reklam__three">
        <div class="tabs-container">
            <ul class="tabs-list">
                <li class="tab-item active"><a href="#tabServices">Услуги</a></li>
                <li class="tab-item"><a href="#tabPricing">Цены</a></li>
                <li class="tab-item"><a href="#tabCoverage">Покрытие</a></li>
                <li class="tab-item"><a href="#tabSupport">На работу</a></li>
                <li class="tab-item"><a href="#tabFeedback">На дачу</a></li>
            </ul>
            <div class="tabs-content">
                <div id="tabServices" class="tab active">
                    <div class="cars-container">
                        <div class="car-item">
                        <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Профессиональная мойка</h3>
                            <p class="car-description">Мы предлагаем качественную мойку вашего автомобиля с использованием экологически чистых средств.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Техническое обслуживание</h3>
                            <p class="car-description">Регулярное техническое обслуживание для обеспечения безопасности и надежности вашего автомобиля.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Прокат автомобилей</h3>
                            <p class="car-description">Широкий выбор автомобилей для аренды на любой срок.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Экстренная помощь на дороге</h3>
                            <p class="car-description">Круглосуточная помощь в случае поломки или аварии.</p>
                        </div>
                    </div>
                </div>
                <div id="tabPricing" class="tab">
                    <div class="cars-container">
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Стандартный тариф</h3>
                            <p class="car-description">Аренда автомобиля от 2000₽ в день.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Премиум тариф</h3>
                            <p class="car-description">Аренда автомобилей премиум-класса от 5000₽ в день.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Семейный пакет</h3>
                            <p class="car-description">Специальные условия для семейных поездок от 3000₽ в день.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Корпоративные тарифы</h3>
                            <p class="car-description">Индивидуальные предложения для бизнеса и корпоративных клиентов.</p>
                        </div>
                    </div>
                </div>
                <div id="tabCoverage" class="tab">
                    <div class="cars-container">
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Полное покрытие</h3>
                            <p class="car-description">Страхование от всех рисков, включая аварии и угоны.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Частичное покрытие</h3>
                            <p class="car-description">Страхование от основных рисков с низкой франшизой.</p>
                        </div>
                        <div class="car-item">
                            <img src="#" class="car-image" alt="">
                            <h3 class="car-title">Дополнительные услуги</h3>
                            <p class="car-description">Возможность добавления услуг, таких как защита от повреждений.</p>
                        </div>
                    </div>
                </div>
                <div id="tabSupport" class="tab">
                <div class="grid">
                    <div class="grid__inner">
                        <img id="car__cherry__tiggo" src="./image/orig (6).png" loading="lazy" alt="">
                        <h1 id="title__cherry">MUSTANG '65</h1>
                    </div>
                    <div class="grid__inner">
                        <img id="car__cherry__moscwich" src="./image/orig (4).png" loading="lazy" alt="">
                        <h1 id="title__moscwich">HAVAL JOLION</h1>
                    </div>
                    <div class="grid__second">
                    <div class="inner__grid">
                        <div class="center__inn">
                        <h1 class="price__work">ОТ 5000₽</h1>
                        <li id="li">Точно знаете, куда едете</li>
                        <li id="li">Цена не поменяется</li></div>
                    </div>
                    <div class="inner__grid">
                      <h1 id="club">Клуб Драйва</h1>
                      <p id="skid">Даёт скидку 20%, бесплатное <br> ожидание ночью и до 20 минут<br> днём, +5 минут на осмотр и фильтр<br> «Только что помыли» тоже будет<br> вам.</p>
                    </div></div>
                </div>
                </div>
                <div id="tabFeedback" class="tab">
                <div class="grid">
                    <div class="grid__inner">
                        <img id="car__cherry__tiggo" src="./image/orig (2).png" loading="lazy" alt="">
                        <h1 id="title__cherry">cherry tiggo 4</h1>
                    </div>
                    <div class="grid__inner">
                        <img id="car__cherry__moscwich" src="./image/orig (5).png" loading="lazy" alt="">
                        <h1 id="title__moscwich">GEELY ATLAS PRO</h1>
                    </div>
                    <div class="grid__second">
                    <div class="inner__grid__second">
                        <div class="center__inn">
                        <h1 class="price__work">ОТ 3200₽</h1>
                        <li id="li">Можно далеко уехать</li>
                        <li id="li">Если машина нужна на долго</li></div>
                    </div>
                    <div class="inner__grid__second">
                      <h1 id="club">Клуб Драйва</h1>
                      <p id="skid">Даёт скидку 20%, бесплатное <br> ожидание ночью и до 20 минут<br> днём, +5 минут на осмотр и фильтр<br> «Только что помыли» тоже будет<br> вам.</p>
                    </div></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="wrapp__orange__juice">
    <div class="orange__juice">
    <h1 class="key">ВАШ КЛЮЧ ОТ<br> МАШИНЫ — НАШ<br> СЕРВИС</h1>
    <p class="reg__title">Зарегистрируйтесь и авторизуйтесь для оформления заявки</p>
    <button class="btn__register"><a href="register.php">Регистрация</a></button>
    <div class="phone__background">
    <img src="./image/image 37.png"></div>
    </div>
</div>

<div class="transform-container">
    <div class="grid-container">
        <img src="./image/backfirst.png" class="animation-oscillating" alt="Flux background element 1">
        <img src="https://canvas-generations-v1.s3.us-west-2.amazonaws.com/2_flux_bg.webp" class="animation-oscillating" alt="Flux background element 2">
        <img src="https://canvas-generations-v1.s3.us-west-2.amazonaws.com/3_flux_bg.webp" class="animation-oscillating" alt="Flux background element 3">
        <img src="https://canvas-generations-v1.s3.us-west-2.amazonaws.com/4_flux_bg.webp" class="animation-oscillating" alt="Flux background element 4">
        <img src="https://canvas-generations-v1.s3.us-west-2.amazonaws.com/5_flux_bg.webp" class="animation-oscillating" alt="Flux background element 5">
        <img src="https://canvas-generations-v1.s3.us-west-2.amazonaws.com/6_flux_bg.webp" class="animation-oscillating" alt="Flux background element 6">
        <img src="https://canvas-generations-v1.s3.us-west-2.amazonaws.com/7_flux_bg.webp" class="animation-oscillating" alt="Flux background element 7">
        <img src="https://canvas-generations-v1.s3.us-west-2.amazonaws.com/8_flux_bg.webp" class="animation-oscillating" alt="Flux background element 8">
    </div>
</div>

<div id="center__reviews__zagol">
<h1 id="typing-text"></h1><span id="cursor" class="cursor">|</span></div>
<?php
    if ($stmt->rowCount() > 0) {
        echo '<div class="sntr"><div class="review-slider">'; // Начало слайдера
    
        // Вывод каждой строки результата
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="review-card">
                    <h3>' . htmlspecialchars($row["user_name"]) . '</h3>
                    <p>Рейтинг — ' . renderStarRating(htmlspecialchars($row["rating"])) . '</p>
                    <strong><p id="reviews__txt">' . renderCommentWithImage(htmlspecialchars($row["review"])) . '</p></strong>
                    <p id="public"><small>Опубликовано: ' . htmlspecialchars($row["created_at"]) . '</small></p>
              </div>';
        }
    
        echo '</div></div>'; 
    } else {
        echo "0 results";
    }
    
    
    function renderStarRating($rating) {
        $output = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $output .= '<img src="./image/star (2).png" class="star">';
            } else {
                $output .= '<img src=""  class="star">';
            }
        }
        return $output;
    }

    // function renderDateWithIcon($date) {
    //     $formattedDate = date("d.m.Y H:i", strtotime($date)); 
    //     return '<span style="display: inline-block;"><img src="./image/Group 47 (1).png" alt="Дата" class="date-icon"></span> Опубликовано: ' . $formattedDate;
    // }


    
    function renderCommentWithImage($comment) {
        return '<img src="./image/Group 263 (2).png" class="comment-icon" style="vertical-align: middle;"> — <span>«' . htmlspecialchars($comment) . '»</span>';
    }

?>




<footer class="footer">
<div class="logo__flex__foot">
<div class="logo__foot">
<a href="#"><img width="112" height="64" src="./image/Group 248 (1).png" alt=""></a>
</div>
</div>
<div class="cent">
<div class="cen">
<nav class="footer-nav">
        <ul class="mob">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Услуги</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </nav>

<div class="links__social">
<div class="social__inner"><a href="#"><svg class="soc" width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M23 0C35.703 0 46 10.297 46 23C46 35.703 35.703 46 23 46C10.297 46 0 35.703 0 23C0 10.297 10.297 0 23 0ZM30.934 32.375C31.357 31.077 33.339 18.141 33.584 15.592C33.658 14.82 33.414 14.307 32.936 14.078C32.358 13.8 31.502 13.939 30.509 14.297C29.147 14.788 11.735 22.181 10.729 22.609C9.775 23.014 8.873 23.456 8.873 24.096C8.873 24.546 9.14 24.799 9.876 25.062C10.642 25.335 12.571 25.92 13.71 26.234C14.807 26.537 16.056 26.274 16.756 25.839C17.498 25.378 26.061 19.648 26.676 19.146C27.29 18.644 27.78 19.287 27.278 19.79C26.776 20.292 20.898 25.997 20.123 26.787C19.182 27.746 19.85 28.74 20.481 29.138C21.202 29.592 26.387 33.07 27.168 33.628C27.949 34.186 28.741 34.439 29.466 34.439C30.191 34.439 30.573 33.484 30.934 32.375Z" fill="white"/>
</svg></a>
</div>
<div class="social__inner"><a href="#"><svg class="soc" width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M40.5238 0H5.47619C2.45333 0 0 2.45333 0 5.47619V40.5238C0 43.5467 2.45333 46 5.47619 46H40.5238C43.5467 46 46 43.5467 46 40.5238V5.47619C46 2.45333 43.5467 0 40.5238 0ZM36.9314 31.7619L32.8462 31.751C32.8462 31.751 32.7586 31.7619 32.6162 31.7619C32.2876 31.7619 31.6086 31.6743 30.809 31.1267C29.3743 30.13 28.0052 27.6548 26.921 27.6548C26.8443 27.6548 26.7786 27.6657 26.7129 27.6876C25.771 27.9833 25.4862 28.9252 25.4862 30.0752C25.4862 30.4805 25.2014 30.6667 24.4348 30.6667H22.321C19.9552 30.6667 17.6662 30.6119 15.0924 27.7971C11.3029 23.6462 7.75429 16.2643 7.75429 16.2643C7.75429 16.2643 7.55714 15.8371 7.76524 15.5852C7.96238 15.3552 8.42238 15.3333 8.59762 15.3333C8.64143 15.3333 8.66333 15.3333 8.66333 15.3333H13.0443C13.0443 15.3333 13.4495 15.41 13.7452 15.629C13.9971 15.8152 14.1286 16.1548 14.1286 16.1548C14.1286 16.1548 14.8733 17.6005 15.8043 19.2324C17.3705 21.9267 18.2138 22.8248 18.8162 22.8248C18.9148 22.8248 19.0133 22.8029 19.1119 22.7481C20.01 22.2552 19.7471 18.2686 19.7471 18.2686C19.7471 18.2686 19.7581 16.8229 19.2871 16.1876C18.9257 15.6838 18.2357 15.5414 17.929 15.4976C17.6881 15.4648 18.0824 14.8952 18.6081 14.6324C19.2871 14.3038 20.4152 14.2381 21.7733 14.2381H22.4305C23.7119 14.26 23.7448 14.3914 24.2486 14.5119C25.76 14.8733 25.2452 16.2862 25.2452 19.6705C25.2452 20.7548 25.0481 22.2771 25.8257 22.7919C25.8805 22.8248 25.9571 22.8467 26.0557 22.8467C26.5595 22.8467 27.6438 22.2005 29.3743 19.2762C30.3381 17.6114 31.0829 15.9576 31.0829 15.9576C31.0829 15.9576 31.2471 15.6619 31.499 15.5086C31.74 15.3662 31.74 15.3662 32.0576 15.3662H32.0905C32.441 15.3662 35.9238 15.3333 36.6905 15.3333H36.7781C37.5119 15.3333 38.18 15.3443 38.3005 15.7933C38.4757 16.4724 37.7638 17.6881 35.891 20.2071C32.8024 24.3362 32.4519 24.0295 35.0148 26.4171C37.4681 28.6952 37.9719 29.8014 38.0595 29.9438C39.0781 31.6305 36.9314 31.7619 36.9314 31.7619Z" fill="white"/>
</svg></a></div>
<div class="social__inner"><a href="#"><svg class="soc" width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M39.625 5.10117C35.6445 0.767661 29.3477 0.0330781 29.0781 0.00665327C28.6602 -0.0409093 28.2617 0.276177 28.0898 0.79937C28.0742 0.831078 27.9375 1.25914 27.7852 1.92503C30.418 2.52749 33.6523 3.7377 36.5781 6.19512C37.0469 6.58619 37.1914 7.42119 36.9023 8.05536C36.7109 8.47286 36.3867 8.7001 36.0508 8.7001C35.8711 8.7001 35.6875 8.6314 35.5234 8.49399C30.4922 4.27146 24.2109 4.06007 23 4.06007C21.7891 4.06007 15.5039 4.27146 10.4766 8.49399C10.0078 8.89035 9.39063 8.69481 9.10156 8.06064C8.80859 7.42119 8.95312 6.59148 9.42188 6.19512C12.3477 3.74299 15.582 2.52749 18.2148 1.93031C18.0625 1.25915 17.9258 0.836364 17.9141 0.79937C17.7383 0.276177 17.3438 -0.0514782 16.9219 0.00665327C16.6523 0.0330781 10.3555 0.767661 6.32031 5.1593C4.21484 7.7964 0 23.2068 0 36.5297C0 36.7675 0.046875 36.9948 0.132813 37.2009C3.03906 44.1133 10.9727 45.9207 12.7812 46C12.7891 46 12.8008 46 12.8125 46C13.1328 46 13.4336 45.7939 13.6211 45.4451L15.4492 42.0417C10.5156 40.3189 7.99609 37.3911 7.85156 37.2167C7.4375 36.7252 7.39844 35.8691 7.76562 35.3089C8.12891 34.7487 8.76172 34.6959 9.17578 35.1874C9.23438 35.2614 13.875 40.5884 23 40.5884C32.1406 40.5884 36.7812 35.2402 36.8281 35.1874C37.2422 34.7012 37.8711 34.7487 38.2383 35.3142C38.6016 35.8744 38.5625 36.7252 38.1484 37.2167C38.0039 37.3911 35.4844 40.3189 30.5508 42.0417L32.3789 45.4451C32.5664 45.7939 32.8672 46 33.1875 46C33.1992 46 33.2109 46 33.2188 46C35.0273 45.9207 42.9609 44.1133 45.8672 37.2009C45.9531 36.9948 46 36.7675 46 36.5297C46 23.2068 41.7852 7.79641 39.625 5.10117ZM16.5 31.1181C14.5664 31.1181 13 28.6977 13 25.7065C13 22.7153 14.5664 20.2949 16.5 20.2949C18.4336 20.2949 20 22.7153 20 25.7065C20 28.6977 18.4336 31.1181 16.5 31.1181ZM29.5 31.1181C27.5664 31.1181 26 28.6977 26 25.7065C26 22.7153 27.5664 20.2949 29.5 20.2949C31.4336 20.2949 33 22.7153 33 25.7065C33 28.6977 31.4336 31.1181 29.5 31.1181Z" fill="white"/>
</svg></a></div>
<div class="social__inner"><a href="#"><svg class="soc" width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M23.0001 0C10.3181 0 0.000148423 10.318 0.000148423 23C0.000148423 26.96 1.02315 30.854 2.96315 34.29L0.0371484 44.73C-0.0588516 45.073 0.0341485 45.441 0.282148 45.696C0.473148 45.893 0.733148 46 1.00015 46C1.08015 46 1.16115 45.99 1.24015 45.971L12.1361 43.272C15.4631 45.058 19.2101 46 23.0001 46C35.6821 46 46.0001 35.682 46.0001 23C46.0001 10.318 35.6821 0 23.0001 0ZM34.5701 31.116C34.0781 32.478 31.7181 33.721 30.5841 33.888C29.5661 34.037 28.2781 34.101 26.8641 33.657C26.0071 33.387 24.9071 33.029 23.4981 32.428C17.5751 29.902 13.7071 24.013 13.4111 23.624C13.1161 23.235 11.0001 20.463 11.0001 17.594C11.0001 14.725 12.5251 13.314 13.0671 12.73C13.6091 12.146 14.2481 12 14.6421 12C15.0361 12 15.4291 12.005 15.7741 12.021C16.1371 12.039 16.6241 11.884 17.1031 13.022C17.5951 14.19 18.7761 17.059 18.9221 17.352C19.0702 17.644 19.1681 17.985 18.9721 18.374C18.7761 18.763 18.6781 19.006 18.3821 19.347C18.0861 19.688 17.7621 20.107 17.4961 20.369C17.2001 20.66 16.8931 20.975 17.2371 21.559C17.5811 22.143 18.7661 24.052 20.5221 25.598C22.7771 27.584 24.6801 28.2 25.2701 28.492C25.8601 28.784 26.2051 28.735 26.5491 28.346C26.8931 27.956 28.0251 26.643 28.4181 26.06C28.8111 25.477 29.2051 25.573 29.7471 25.768C30.2891 25.962 33.1922 27.372 33.7822 27.664C34.3722 27.956 34.7662 28.102 34.9142 28.345C35.0621 28.587 35.0621 29.755 34.5701 31.116Z" fill="white"/>
</svg></a></div>
</div></div></div>
<div class="btn__foot__fl">
<button id="btn__check">Оставить заявку</button></div>
</footer>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/gsap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="first.js"></script>
</body>
</html>