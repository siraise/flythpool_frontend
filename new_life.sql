-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 11 2024 г., 09:17
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
-- База данных: `new_life`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_animal` varchar(256) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `mark` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `date_found` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type_animal`, `description`, `mark`, `address`, `date_found`) VALUES
(1, 1, 'cat', 'Black and White', 'HZ', 'Lenina, 25', '2014-12-01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `agree` tinyint(1) NOT NULL,
  `api_token` varchar(256) DEFAULT NULL,
  `type` varchar(256) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `phone`, `password`, `agree`, `api_token`, `type`) VALUES
(1, '[imaya]', '[surname', '[imaya@.gmail.com]', '[123456]', '[12]', 0, '[0]', 'default'),
(2, '[value-2]', '[value-3]', '[value-4]', '8123456', '[value-6]', 0, '[value-8]', 'default'),
(3, 'eeeeeeeeeeee', 'eeeeeeeeeeeeee', 'wqweeee@mail.ru', '33333333333333333', '$2y$10$Rg8QjB1Y.xmMULevGqUlDONZUQ7Z6cLfAbaI9.Ozylz9.1uKpZfDm', 1, NULL, 'default'),
(4, 'dsdfdsf', 'asadsadsadasdsadsa', 'qweqwe@dsfds.ru', '4444444444444', '$2y$10$c7aqLxZ7TYylCRpujiDjjOTrbgHLUsYOOlI8KpLdtJ4gl364eiOrC', 1, NULL, 'mod'),
(5, 'Данияр', 'St1nG', 'aituganow1@gmail.com', '123456', '$2y$10$Tfbq5Jp.YyaJLRLBEPNSBuxyrTMfRE.azrPEXy6HW9eemI/zZjo0a', 1, NULL, 'default'),
(7, 'Данияр', 'St1nG', 'aituganow2@gmail.com', '3434534553', '$2y$10$hvunK1l/BnvWeUPvznv49..4eaXSgfurt1VpA8eiUX8.L4hTKoQJ6', 1, NULL, 'default'),
(8, 'Igor', 'Del', 'deligor02.06.2004@gmail.com', '880005553555', '$2y$10$UxOh0aa52oq5AKKwjMkTC.DHXVE7W2BBlhByUMbJECIpkRGbWdn0.', 1, NULL, 'default'),
(9, 'Egor', 'Del', 'ex@mail.ru', '89993336556', 'ed6556', 1, 'aGFzaD0xNzMzNzEwOTAxJmVtYWlsPWV4QG1haWwucnUmcGFzc3dvcmQ9ZWQ2NTU2', 'default'),
(10, 'Модератор', 'Модераторов', 'mod@mail.ru', '87776665544', 'mod5544', 1, 'aGFzaD0xNzMzODk2ODM3JmVtYWlsPW1vZEBtYWlsLnJ1JnBhc3N3b3JkPW1vZDU1NDQ=', 'mod');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
