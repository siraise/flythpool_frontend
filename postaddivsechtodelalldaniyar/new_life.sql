-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 18 2024 г., 07:20
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

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
  `type_animal` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `mark` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `date_found` date DEFAULT NULL,
  `status` varchar(256) DEFAULT 'mod'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type_animal`, `description`, `mark`, `address`, `date_found`, `status`) VALUES
(1, 3, 'cat', 'текст', 'text', 'karasuk', '2024-12-12', 'mod'),
(2, 6, 'cat', 'some texdt', '-', 'karasuk', '2024-12-15', 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `agree` tinyint(1) NOT NULL,
  `api_token` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `phone`, `password`, `agree`, `api_token`, `type`) VALUES
(1, 'Иван', 'Иванов', 'ivan.ivanov@mail.ru', '88005674560', 'password123', 1, 'aGFzaD0xNzMzNzEwNjI4JmVtYWlsPWl2YW4uaXZhbm92QG1haWwucnUmcGFzc3dvcmQ9cGFzc3dvcmQxMjM=', 'mod'),
(3, 'Ivan', 'Ivanov', 'example@mail.ru', '89231277640', '123', 0, 'aGFzaD0xNzM0NTAyMTM2JmVtYWlsPWV4YW1wbGVAbWFpbC5ydSZwYXNzd29yZD0xMjM=', 'default'),
(5, 'Ivan', 'Ivanov', 'exampleeew@mail.ru', '89232399840', '123', 1, NULL, 'default'),
(6, 'John', 'Doe', 'john.doe@gmail.ru', '8283298329', '123', 1, NULL, 'default');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
