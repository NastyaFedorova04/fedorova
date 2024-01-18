-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 17 2024 г., 02:16
-- Версия сервера: 10.7.5-MariaDB-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yoganow`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(100) NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `photo`, `name`, `time`, `description`) VALUES
(1, 'images/img_1.jpg', 'СОБЕРИСЬ С ДУХОМ', '9 ЯНВАРЯ, 2024', 'Йога существует в мире, потому что все взаимосвязано .'),
(2, 'images/img_2.jpg', 'Йога для повышения устойчивости', '10 ЯНВАРЯ, 2024', 'Йога — это практика разума и тела, независимо от того, каким видом йоги вы занимаетесь, и она помогает вашему разуму сосредоточиться на том, на чем вы можете сосредоточиться, когда вы двигаетесь по коврику.'),
(3, 'images/img_3.jpg', 'Сильная и независимая', '14 января, 2024', 'Занимаясь йогой, я могу оставаться достаточно гибкой, чтобы пнуть свою собственную задницу, если это необходимо .'),
(4, 'images/img_4.jpg', 'Гибкость тела', '17 января, 2024', 'Успех йоги заключается не в нашей способности выполнять позы, а в том, как они меняют наш образ жизни. '),
(5, 'images/img_5.jpg', 'Умиротворение', '23 января, 2024', 'С помощью йоги каждый может исследовать свое внутреннее существо с научной точностью, чтобы понять его природу, структуру и функционирование. Цель состоит в том, чтобы достичь самопознания, развивая нашу чувствительность и обостряя ясность видения.'),
(6, 'images/img_6.jpg', 'Здоровый дух', '24 ноября, 2024', 'Йога может служить введением в использование мантр в вашей практике или помочь вам оставаться воодушевленными и мотивированными, независимо от того, новичок ли вы в этом предмете или уже несколько десятилетий занимаетесь йогой для собак.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `is_admin`) VALUES
(2, '123', '123', '202cb962ac59075b964b07152d234b70', 0),
(3, 'Алексей Алексей', ' 79999999991', '202cb962ac59075b964b07152d234b70', 1),
(4, 'Вася', '+79989999192', '$2y$10$.hCH7uXj.iaz2QoNjco72eQaFIIDlWcwUSvkXwJSTlHqISsJ1psdu', 0),
(5, 'Вася', '+79989999191', '$2y$10$Sa0HaE77SnD0koCbm3foyOTvbXoxOMj6jDU6C7Vw59AiVrBxdhoFi', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
