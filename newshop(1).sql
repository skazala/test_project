-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 29 2022 р., 15:01
-- Версія сервера: 10.4.19-MariaDB
-- Версія PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `newshop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `customers`
--

CREATE TABLE `customers` (
  `id` smallint(6) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `date_of_registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `email`, `address`, `phone`, `date_of_registration`) VALUES
(1, 'julia', 'bulia', 'julia@dot.com', '51 Sokak', '+380660918318', '2022-03-27'),
(16, 'masha', 'kasha', 'rasskazala@gmail.com', 'Marshalkovskogo', '+1234567890', '2022-03-28'),
(17, 'anton', 'baton', 'rasskazala@gmail.com', '51 Sokak', '+1234567890', '2022-03-28'),
(18, 'gosha', 'kalosha', 'rasskazala@gmail.com', '51 Sokak', '+1234567890', '2022-03-28'),
(19, 'oksana', 'oksana', 'oksana@gmail.com', 'Site Rose', '+0987654321', '2022-03-28'),
(20, 'arina', 'balerina', 'arina@gmail.com', 'Site Rose', '+1234509876', '2022-03-28'),
(21, 'alisa', 'kisa', 'alisa@gmail.com', 'Site Rose', '+5432167890', '2022-03-28'),
(22, 'ilya', 'theb', 'ilya@gmail.com', '51 Sokak', '+2244668800', '2022-03-28'),
(23, 'tim', 'bim', 'tim@gmail.com', 'Site Rose', '+1133557799', '2022-03-28'),
(24, 'yulia', 'krot', 'krot@gmail.com', 'Nora', '+1236547890', '2022-03-28'),
(25, 'sergey', 'krot', 'skrot@gmail.com', 'Nora', '+1234567809', '2022-03-28'),
(26, 'dina', 'krot', 'dkrot@gmail.com', 'Nora', '+2234567899', '2022-03-28'),
(27, 'david', 'krot', 'krotkiy@gmail.com', 'Nora', '+2345168709', '2022-03-28'),
(28, 'yulia', 'kolkova', 'begaet@gmail.com', '61 Sokak', '+1133557799', '2022-03-31'),
(29, 'papa', 'shlyapa', 'papa@gmail.com', 'Simirenko', '+1234567890', '2022-04-01'),
(47, 'GGG', 'GGG', 'rasskazala@gmail.com', '51 Sokak', '+1234567890', '2022-04-19'),
(50, 'Ilia', 'Fintiflia', 'ilia@gmail.com', '51 Sokak', '+0000000000', '2022-04-19'),
(52, 'AAA', 'BBB', 'ayab@gmail.com', '34 Sokak', '+1234566666', '2022-04-19'),
(53, 'Painter', 'Needs', 'paint@gmail.com', '51 Sokak', '+5432167891', '2022-04-20'),
(57, 'Lady', 'Gaga', 'gaga@gmail.com', '2344 Sokak', '+905514444422', '2022-05-24'),
(58, 'Paul', 'Smith', 'paul@gmail.com', 'England', '+905514444499', '2022-05-25'),
(59, 'Mamma', 'Mia', 'here@i.come', 'Again', '+1234567890', '2022-05-25'),
(61, 'Azirafel', 'Swin', 'guineapig@gmail.com', 'Kopenhagen', '+333999439043', '2022-05-25');

-- --------------------------------------------------------

--
-- Структура таблиці `loyalty_cards`
--

CREATE TABLE `loyalty_cards` (
  `id` smallint(6) NOT NULL,
  `number` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `customer_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `loyalty_cards`
--

INSERT INTO `loyalty_cards` (`id`, `number`, `type`, `customer_id`) VALUES
(1, 1354, 'virtual', 1),
(5, 1355, 'virtual', 16),
(6, 1356, 'plastic', 17),
(7, 1357, 'plastic', 18),
(8, 1358, 'virtual', 19),
(9, 1359, 'virtual', 20),
(10, 1360, 'plastic', 21),
(11, 1361, 'virtual', 22),
(12, 1362, 'virtual', 23),
(13, 1363, 'plastic', 24),
(14, 1364, 'plastic', 25),
(15, 1365, 'virtual', 26),
(16, 1366, 'virtual', 27),
(17, 1367, 'plastic', 28),
(18, 1368, 'plastic', 29),
(23, 1369, 'plastic', 47),
(26, 1370, 'virtual', 50),
(27, 1371, 'virtual', 52),
(28, 1372, 'plastic', 53),
(29, 1373, 'plastic', 57),
(30, 1374, 'virtual', 58),
(31, 1375, 'virtual', 59),
(32, 1376, 'plastic', 61);

-- --------------------------------------------------------

--
-- Структура таблиці `purchased_items`
--

CREATE TABLE `purchased_items` (
  `name` varchar(30) NOT NULL,
  `price` smallint(6) NOT NULL,
  `amount` tinyint(4) NOT NULL,
  `purchase_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `purchased_items`
--

INSERT INTO `purchased_items` (`name`, `price`, `amount`, `purchase_id`) VALUES
('apple', 1, 1, 1),
('pear', 1, 1, 1),
('plum', 2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `purchases`
--

CREATE TABLE `purchases` (
  `id` smallint(6) NOT NULL,
  `loyalty_card_id` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `purchases`
--

INSERT INTO `purchases` (`id`, `loyalty_card_id`, `date`, `total_price`, `customer_id`) VALUES
(1, 1356, '2022-03-28', 6, 17),
(2, 1357, '2022-03-28', 10, 18),
(3, 1357, '2022-03-28', 20, 18),
(4, 1358, '2022-03-28', 1, 19),
(5, 1359, '2022-03-28', 65, 20),
(6, 1360, '2022-03-28', 60, 21),
(7, 1359, '2022-03-28', 15, 20),
(8, 1360, '2022-03-28', 50, 21),
(9, 1359, '2022-03-28', 105, 20),
(10, 1360, '2022-03-28', 6, 21),
(11, 1359, '2022-03-28', 6, 20),
(12, 1360, '2022-03-28', 6, 21),
(13, 1363, '2022-03-28', 65, 24),
(14, 1364, '2022-03-28', 60, 25),
(15, 1365, '2022-03-28', 65, 26),
(16, 1366, '2022-03-28', 60, 27),
(17, 1366, '2022-03-28', 65, 27),
(18, 1366, '2022-03-28', 60, 27),
(19, 1359, '2022-03-28', 15, 20),
(20, 1360, '2022-03-28', 20, 21),
(21, 1361, '2022-03-28', 25, 22),
(22, 1362, '2022-03-28', 20, 23),
(23, 1363, '2022-03-28', 25, 24),
(24, 1364, '2022-03-28', 20, 25),
(25, 1376, '2022-05-29', 400, 61),
(26, 1369, '2022-05-29', 80, 47),
(27, 1375, '2022-05-29', 93, 59),
(28, 1366, '2022-05-15', 317, 27),
(29, 1369, '2022-05-26', 14, 47),
(30, 1356, '2022-04-30', 100, 17),
(31, 1359, '2022-05-28', 9, 20);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `h_password` longtext NOT NULL,
  `email` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `h_password`, `email`) VALUES
(1, 'Krossing', '$2y$10$SjWd/zHR0gR6z/gQ5u66kebXNX42vrrHbxwla4BtaTMKjJqDu.Ij6', 'krossing@gmail.com'),
(2, 'Krossing2', '$2y$10$aUFy3r6VRk0NjlCoVs7X0exljKRxFDEgla1moW2xRXaUzOv9CPod6', 'krossing2@gmail.com');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Індекси таблиці `loyalty_cards`
--
ALTER TABLE `loyalty_cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `customer_id_FK` (`customer_id`);

--
-- Індекси таблиці `purchased_items`
--
ALTER TABLE `purchased_items`
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Індекси таблиці `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `card_id_FK` (`loyalty_card_id`),
  ADD KEY `customer_id_FK` (`customer_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `customers`
--
ALTER TABLE `customers`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблиці `loyalty_cards`
--
ALTER TABLE `loyalty_cards`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблиці `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
