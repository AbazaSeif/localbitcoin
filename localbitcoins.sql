-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2017 г., 06:05
-- Версия сервера: 5.7.11-log
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `localbitcoins`
--

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id_msg` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `closed` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `support`
--

INSERT INTO `support` (`id_msg`, `message`, `created_on`, `closed`, `user_id`, `to_id`) VALUES
(2, 'Test message тестовое сррьщение\nперевод строки\n\nещё\n\nЪъэЄєёЁьє''`~', '2016-11-24 00:56:25', 1, 1, 0),
(3, 'sdfsd', '2016-12-03 16:47:03', 1, 1, 0),
(4, 'Какой-то вопрос', '2017-01-22 22:58:28', 0, 1, 0),
(5, 'Вопрос от другого пользователя', '2017-01-22 23:26:38', 1, 5, 0),
(6, 'asdaa', '2017-01-23 04:21:31', 1, 0, 5),
(7, 'Еще вопрос', '2017-01-23 04:35:57', 1, 5, 0),
(8, 'Хелов ворд', '2017-01-23 04:58:29', 0, 5, 0),
(9, 'Ку', '2017-01-23 04:58:43', 0, 0, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id_msg`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
