-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 22 2024 г., 18:18
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
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id_car` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id_car`, `image`, `name`, `year`, `type`, `price`) VALUES
(1, './image/image.png', 'RENAULT LOGAN', 2020, 'МКПП', 2300),
(2, './image/image (1).png', 'LADA LARGUS', 2020, 'МКПП', 2800),
(3, './image/image (2).png', 'KIA RIO', 2021, 'АКПП', 2800),
(4, './image/image (3).png', 'VOLKSWAGEN POLO', 2020, 'АКПП\r\n', 2800),
(5, './image/image (4).png', 'HYUNDAI SOLARIS', 2020, 'АКПП', 2800),
(6, './image/image (5).png', 'RENAULT KAPTUR', 2020, 'АКПП', 3200),
(7, './image/image (6).png', 'KIA RIOX', 2022, 'АКПП', 3500),
(8, './image/image (7).png', 'MERCEDEC BENZ GLA', 2020, 'АКПП', 5000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id_car`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id_car` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;