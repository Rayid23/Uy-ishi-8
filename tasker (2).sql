-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 17 2024 г., 05:04
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `image`, `user_id`, `status`, `comment`) VALUES
(5, 'Разработка модуля отчётов', 'Необходимо разработать новый модуль отчётов, который позволит пользователям генерировать, просматривать и экспортировать отчёты с данными из системы. Модуль должен быть гибким и поддерживать различные форматы отчётов (PDF, Excel, CSV). Также он должен обе', 'Images/Picture_task1.png', 23, 'success', ''),
(6, 'Продать Лего', 'Продать за 20$', 'Images/Picture_Лего.jpg', 23, 'success', ''),
(7, 'Продать', '1. Продать за 10$ \r\n2. 10 штук продать', 'Images/Picture_Nuka cola.jpg', 24, 'success', ''),
(8, 'Продать', '1. Продать за 25$\r\n2. Продать штук 10\r\n3. Зделать отчет продаж\r\n4. Продать минимум за 20$', 'Images/Picture_Квантовая кола.jpg', 24, 'success', ''),
(9, 'Продать', '1. Продать за 74000$\r\n2. Продать штук 3\r\n3. Бонус за каждую продажу 500$\r\n4. Зделать договор', 'Images/Picture_Li.png', 24, 'success', ''),
(10, 'sedd', 'ddererddfa', 'Images/Picture_Fizik.jpg', 24, 'progress', NULL),
(11, 'xcasdw', 'asdasdxcas', 'Images/Picture_studentC.jpg', 24, 'progress', NULL),
(13, 'Оптимизация производительности базы данных', 'Провести анализ текущей структуры базы данных и оптимизировать запросы для повышения производительности. Основное внимание уделить индексации таблиц и уменьшению времени отклика на запросы. Ожидается завершение до конца месяца.', 'Images/Picture_data.jpg', 26, 'send', NULL),
(14, 'Аудит безопасности веб-приложения', 'Провести полный аудит безопасности веб-приложения, включая тестирование на проникновение, анализ уязвимостей и оценку защиты данных. Подготовить отчет с рекомендациями по улучшению безопасности. Срок выполнения — 1 неделя.', 'Images/Picture_audit.jpg', 23, 'success', NULL),
(15, 'test', 'adasdasd', 'Images/Picture_StudenB.jpg', 23, 'success', NULL),
(16, 'asdasd', 'asdasdads', 'Images/Picture_vir.jpg', 23, 'cancel', 'Не принимается'),
(17, 'Продать', 'фывфывфывфыв', 'Images/Picture_studentB.jpg', 23, 'success', NULL),
(18, 'asd111', 'asdasdasdasd', 'Images/Picture_Квантовая кола.jpg', 23, 'success', NULL),
(19, 'LOL12', 'LoL13', 'Images/Picture_task1.png', 23, 'success', NULL),
(20, 'asdasdasdasdasd', 'asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasas', 'Images/Picture_default.jpg', 23, 'send', NULL),
(21, 'FERFERFER', 'FERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFERFER', 'Images/Picture_default.jpg', 24, 'send', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(7, 'Madiyor', 'Raydi', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin', 'Управляющий'),
(23, 'asdasd', 'asd', '7815696ecbf1c96e6894b779456d330e', 'user', 'Принята'),
(24, 'Анастасия Смирнова', 'Candy', 'c548bdf4963bb316f7cc49ec437d1de5', 'user', 'Принята'),
(25, 'Sarah John', 'Sarass', '0b909d567a737b73862a4fb446d49e9b', 'user', 'Принята'),
(26, 'Александр Ковалёв', 'Dandi', 'a01610228fe998f515a72dd730294d87', 'user', 'Принята'),
(27, 'Лилия Солнцева', 'Lili', '777bbb7869ae8193249f8ff7d3e59afe', 'user', 'Принята'),
(28, 'Станислав Буревестник', 'Sega', '34b81f08e80d23ea2454472421070786', 'user', 'Принята'),
(29, 'Ирина Лунная', 'Ferr', '7c81cc58eddf037c5a1c5130f90d3030', 'user', 'Не принята'),
(30, 'Алексей Зимин', 'asdasderfer', '9eb25182af81e9a1eecd5b3053b8fb70', 'user', 'Не принята'),
(31, 'Виктор Петров', 'Viktor3434', '14c879f3f5d8ed93a09f6090d77c2cc3', 'user', 'Не принята'),
(32, 'Дмитрий Романов', 'GerGer3478', 'b071cfa81605a94ad80cfa2bbc747448', 'user', 'Не принята'),
(33, 'Татьяна Искристая', 'TerTeri', '9c1aff83be3b0d10b52bae3fb3a64334', 'user', 'Не принята'),
(34, 'Марина Звёздная', 'ВуаВуа', 'cb1472cd237b9fd36e47af96e35df770', 'user', 'Не принята'),
(35, 'Антон Горный', 'фывфыв', '809336c0a3882d1f9865b50eaa4b6f9b', 'user', 'Не принята'),
(36, 'Ольга Ветреная', 'vasad', '6a207dd3f40f2dc3ea3d9471f913514e', 'user', 'Не принята'),
(37, 'Виктор Соколов', 'Defefef', '3ca7b5be8ab33446a269f9e67f0c66c3', 'user', 'Не принята'),
(38, 'Александра Морская', 'Александра Морская', 'e80514d483656fee2f548e01aeebffe3', 'user', 'Не принята'),
(39, 'Юрий Грознов', 'Юрий Грознов', 'c2a8e0b8a3f5dd95d4b162f2297e3668', 'user', 'Не принята');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
