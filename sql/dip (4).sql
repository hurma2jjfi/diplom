-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 16 2024 г., 00:56
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `name`, `phone`) VALUES
(159, 'Сергей', '+7 (905) -48-04'),
(160, 'vobla', '+7 (905) -48-04'),
(161, 'vobla', '+7 (905) -48-04'),
(162, 'авыы', '+7 (909) 373-06-22'),
(163, 'авыы', '+7 (909) 373-06-22'),
(164, 'авыы', '+7 (909) 373-06-22'),
(165, 'авыы', '+7 (909) 373-06-22'),
(166, 'авыы', '+7 (909) 373-06-22'),
(167, 'авыы', '+7 (909) 373-06-22');

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `car` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id`, `fio`, `phone`, `car`, `start_date`, `end_date`, `passport`, `license`, `created_at`) VALUES
(92, 'Афанасьев Кирилл Дмитриевич', '+7(909) 373-0622', 'mercedes', '2024-11-21', '2024-11-22', '', '', '2024-11-14 16:42:50'),
(93, 'Афанасьев Кирилл Дмитриевич', '+7(909) 373-0622', 'mercedes', '2024-11-21', '2024-11-22', '', '', '2024-11-14 16:42:55'),
(94, 'Афанасьев Кирилл Дмитриевич', '+7(909) 373-0622', 'mercedes', '2024-11-21', '2024-11-22', '', '', '2024-11-14 16:43:19'),
(95, 'Афанасьев Кирилл Дмитриевич', '+7(909) 373-0622', 'mercedes', '2024-11-21', '2024-11-22', '', '', '2024-11-14 16:43:45'),
(96, 'Афанасьев Кирилл Дмитриевич', '+7 (909) 373-06-22', 'renault', '2024-11-22', '2024-11-23', '67377fcf73a59-img.webp', '67377fcf74729-img (1) 1.png', '2024-11-15 17:07:27');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id_car` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `privod` varchar(255) DEFAULT NULL,
  `moshnost` int DEFAULT NULL,
  `toplivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id_car`, `image`, `name`, `year`, `type`, `price`, `privod`, `moshnost`, `toplivo`) VALUES
(1, './image/image.png', 'RENAULT LOGAN', 2020, 'МКПП', 2300, 'Передний', 101, 'Бензин/Газ'),
(2, './image/image (1).png', 'LADA LARGUS', 2020, 'МКПП', 2800, 'Передний', 101, 'Бензин/Газ'),
(3, './image/image (2).png', 'KIA RIO', 2021, 'АКПП', 2800, 'Передний', 123, 'Бензин/Газ'),
(4, './image/image (3).png', 'VOLKSWAGEN POLO', 2020, 'АКПП\r\n', 2800, 'Передний', 123, 'Бензин/газ'),
(5, './image/image (4).png', 'HYUNDAI SOLARIS', 2020, 'АКПП', 2800, 'Передний', 123, 'Бензин/газ'),
(6, './image/image (5).png', 'RENAULT KAPTUR', 2020, 'АКПП', 3200, 'Передний', 123, 'Бензин/газ'),
(7, './image/image (6).png', 'KIA RIOX', 2022, 'АКПП', 3500, 'Передний', 123, 'Бензин/газ'),
(8, './image/image (7).png', 'MERCEDEC BENZ GLA', 2020, 'АКПП', 5000, 'Задний', 200, 'Бензин/газ');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `car_id` int NOT NULL,
  `user_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('В ожидании','Подтверждён','Отменён') DEFAULT 'В ожидании',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `car_id`, `user_id`, `start_date`, `end_date`, `total_price`, `status`, `created_at`) VALUES
(1, 2, 12, '2024-11-14', '2024-11-15', '2800.00', 'В ожидании', '2024-11-12 17:07:25'),
(2, 2, 12, '2024-11-22', '2024-11-23', '2800.00', 'В ожидании', '2024-11-12 17:08:35'),
(3, 1, 12, '2024-11-16', '2024-11-21', '2300.00', 'В ожидании', '2024-11-12 17:09:04'),
(4, 3, 12, '2024-11-15', '2024-11-22', '2800.00', 'В ожидании', '2024-11-12 17:09:39'),
(5, 6, 12, '2024-11-23', '2024-11-08', '3200.00', 'В ожидании', '2024-11-12 17:09:55');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `id_car` int NOT NULL,
  `id_user` int NOT NULL,
  `rating` int DEFAULT NULL,
  `review` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `id_car`, `id_user`, `rating`, `review`, `created_at`) VALUES
(17, 5, 12, 5, 'superrr!!!!', '2024-11-15 20:54:41'),
(18, 1, 12, 4, 'cool', '2024-11-15 20:56:55'),
(19, 1, 12, 1, 'sdaads', '2024-11-15 20:57:05'),
(20, 1, 12, 1, 'sdadsa', '2024-11-15 20:58:17'),
(21, 4, 12, 1, 'Заказал форд мондео получил ладу приору вот так сервис я манал е мае ', '2024-11-15 21:23:43'),
(22, 2, 12, 5, 'Ларгус лучший в мире автомобиль !', '2024-11-15 21:55:51');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `remember_token`, `id_user`) VALUES
(1, 'выфвывыфвыф', 'utipov36@gmail.com', '89054804059', '$2y$10$Yp.ELIrIVDgaYP6OrtritePIbyIbuX.mgN6499L8URUJuG98qa35W', NULL, 1),
(11, 'dsdsadsa', 'masha123@mail.ru', '89054804059', '$2y$10$I0UEeeVkIxN874XMhhwou.87Mo1CDpBZ1bhwU9KSooNNN5UhLOvAC', 'bd9e328f41698b0f3156c75c9149ecef', 11),
(12, 'Афанасьев Кирилл Дмитриевич', 'kirik34564@mail.ru', '+7 (909) 373-06-22', '$2y$10$PCfzid5Gh4BL.vGm5FTFWOcmdcmmUNEwQq29GqPujMQIz4lNSPZXO', NULL, 12),
(16, 'Афанасьев Кирилл Дмитриевич', 'kirik3456342424@mail.ru', '+7 (909) 373-06-22', '$2y$10$8EVKF5CYI2AfTCIGBFZpDuM3PqS962PrGEHPOaTqJI6xEqERSC85K', NULL, 16);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id_car`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_car` (`id_car`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id_car` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id_car`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `cars` (`id_car`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
