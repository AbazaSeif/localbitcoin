-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Хост: 10.0.2.11
-- Время создания: Фев 01 2017 г., 02:16
-- Версия сервера: 5.6.32-78.0-log
-- Версия PHP: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a184359_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads_agreements`
--

CREATE TABLE IF NOT EXISTS `ads_agreements` (
  `id_agr` int(11) NOT NULL,
  `from_id` int(11) NOT NULL DEFAULT '0',
  `to_id` int(11) NOT NULL DEFAULT '0',
  `isMoneyTransfered` tinyint(1) NOT NULL DEFAULT '0',
  `ads_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ads_agreements`
--

INSERT INTO `ads_agreements` (`id_agr`, `from_id`, `to_id`, `isMoneyTransfered`, `ads_id`) VALUES
(1, 1, 2, 1, 1),
(3, 1, 2, 0, 2),
(4, 1, 2, 1, 3),
(5, 0, 0, 0, 1),
(6, 0, 0, 0, 2),
(7, 0, 0, 0, 3),
(8, 0, 0, 0, 4),
(9, 0, 0, 0, 5),
(10, 0, 0, 0, 6),
(11, 0, 0, 0, 7),
(12, 0, 0, 0, 1),
(13, 0, 0, 0, 2),
(14, 0, 0, 0, 3),
(15, 0, 0, 0, 4),
(16, 0, 0, 0, 5),
(17, 0, 0, 0, 6),
(18, 0, 0, 0, 7),
(19, 0, 0, 0, 8),
(20, 0, 0, 0, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
  `id_advertisement` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `location` text NOT NULL,
  `currency_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `min_amount` float NOT NULL,
  `max_amount` float NOT NULL,
  `time_of_work` varchar(256) NOT NULL,
  `comment` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expires_in` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `advertisements`
--

INSERT INTO `advertisements` (`id_advertisement`, `type`, `status`, `location`, `currency_id`, `price`, `min_amount`, `max_amount`, `time_of_work`, `comment`, `created_on`, `expires_in`, `user_id`) VALUES
(5, 2, -1, 'Харьков', 2, 736, 10, 40, 'С 9 утра до 8 вечера', '', '2016-11-26 02:35:53', '2016-12-26 00:00:00', 1),
(6, 2, 0, 'Харьков', 2, 1800, 0.0001, 0.5, 'NewEXE', '', '2017-01-22 21:49:12', '2017-02-22 00:00:00', 1),
(7, 2, 0, 'Киев', 2, 1500, 3, 2, 'vinimaks', '', '2017-01-22 21:50:52', '2017-02-22 00:00:00', 5),
(8, 2, 0, 'Львов', 2, 2000, 1.2, 1.2, 'vinimaks', '', '2017-01-24 20:13:30', '2017-02-24 00:00:00', 5),
(9, 2, 0, 'Москва', 2, 3500, 0, 1, 'vinimaks', '', '2017-01-26 23:02:30', '2017-02-26 00:00:00', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `ads_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_message`, `message`, `from_user_id`, `to_user_id`, `created_on`, `ads_id`) VALUES
(11, 'Начинаю тестировать объявление...', 1, 1, '2016-11-26 02:36:32', 5),
(12, 'активна, статус 0. ОК', 1, 1, '2016-11-26 02:40:26', 5),
(13, 'Проверка', 1, 5, '2017-01-26 23:55:51', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `reserve`
--

CREATE TABLE IF NOT EXISTS `reserve` (
  `id_reserve` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `amount` decimal(11,8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reserve`
--

INSERT INTO `reserve` (`id_reserve`, `from_id`, `to_id`, `amount`) VALUES
(1, 1, 2, '0.00000330');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
(8, 'Хелов ворд', '2017-01-23 04:58:29', 1, 5, 0),
(9, 'Ку', '2017-01-23 04:58:43', 1, 0, 5),
(10, 'Хав а ю?', '2017-01-23 06:08:45', 1, 5, 0),
(11, 'Ям файн, сенк ю', '2017-01-23 06:10:02', 1, 0, 5),
(12, 'Работает?', '2017-01-23 07:38:00', 0, 6, 0),
(13, 'dsa', '2017-01-23 07:39:56', 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id_ticket` int(11) NOT NULL,
  `reason` tinyint(4) NOT NULL,
  `from_id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `reason`, `from_id`, `ads_id`, `created_on`) VALUES
(1, 1, 1, 4, '2016-11-23 20:13:59'),
(2, 1, 1, 4, '2016-11-23 20:44:50'),
(3, 1, 1, 4, '2016-11-23 20:45:16'),
(4, 3, 1, 4, '2016-11-23 21:06:16'),
(5, 3, 1, 4, '2016-11-23 21:07:58'),
(6, 1, 1, 4, '2016-11-25 23:53:21'),
(7, 3, 1, 5, '2016-11-29 15:58:04');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `count_of_deals` int(11) NOT NULL DEFAULT '0',
  `transaction_volume` float NOT NULL DEFAULT '0',
  `language` varchar(32) NOT NULL DEFAULT 'Russian',
  `created_on` datetime NOT NULL,
  `verify_string` varchar(16) NOT NULL,
  `verified` tinyint(4) DEFAULT '0',
  `blocked` tinyint(4) DEFAULT '0',
  `online` bigint(20) NOT NULL DEFAULT '0',
  `tfa` int(11) NOT NULL DEFAULT '0',
  `tfa_code` varchar(5) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `phone`, `password`, `role`, `count_of_deals`, `transaction_volume`, `language`, `created_on`, `verify_string`, `verified`, `blocked`, `online`, `tfa`, `tfa_code`) VALUES
(1, 'NewEXE', 'faunasvt@mail.ru', '71234567890', '$2y$10$moYbZJLnMLla6ajm6.Fk3.J/Ktivy6ao2yQmNNwEA.iEIeocVU2h2', 2, 2, 0, 'Russian', '2016-11-18 17:40:16', 'Fn[.Q68[3MDY2BvR', 1, 0, 1485696224, 0, ''),
(2, 'datzu4elo', 'datzu4elo@rr.ua', '', '$2y$10$D9zkDEKU45lQ1Q.ITffZfeF.qFiRmtwaGsTSY.SFfBiL5BaHnTUla', 1, 0, 0, 'Russian', '2016-11-02 15:08:05', '0bH1xI42eXTSL+5"', 1, 0, 0, 0, ''),
(3, 'fsfsdfsd', 'fsd@fdfs.tu', '', '$2y$10$30NviGeO43jexnDjDlup7.sjLZ4Z5Ge1Z/NO5h8LbD7EraTRHdoDK', 1, 0, 0, 'Russian', '2016-11-25 19:53:07', 'u81F^WtGXAb_R[&8', 1, 0, 0, 0, ''),
(4, 'Second', 'second@email.ru', '', '$2y$10$lfCAuakcBANZ6AcvpmfeiuT44zxGBR6y6WJqb3gU2XMZFY976GxSm', 1, 0, 0, 'Russian', '2016-11-26 02:43:23', '!YnHqr`.+q]cpA>e', 1, 0, 0, 0, ''),
(5, 'vinimaks', 'vinimaks56@mail.ru', '711515155115', '$2y$10$8X5yytM6AGEhj7nRwqXIvOMMrxJuuNo/.CqW9EwVAe6Bk0oz5DumG', 2, 3, 0, 'Russian', '2017-01-22 21:27:32', '.o SxMqp7cS%Zx*0', 1, 0, 1485632707, 1, '16QN7'),
(9, 'stayko', 'stayko_10@mail.ru', '71234567890', '$2y$10$UZXO.ydXjSLxjC94VbEe0.YCS7Tspw9oSV60IOW8A4l0T7hFnq7Oe', 1, 0, 0, 'Russian', '2017-01-25 05:37:52', 'i4"RYuOm$[_rwM<%', 1, 0, 0, 0, ''),
(10, 'dmitrij', 'pastormaniac@gmail.com', '79000000000', '$2y$10$z00HhNSkaCZLJuPqXbOtxOibPqh6b4fbn9yLdi0iSMVvdt5JX5oW.', 1, 0, 0, 'Russian', '2017-01-25 12:53:15', '+eZZKvfHSbw>VtI~', 1, 0, 0, 0, ''),
(11, 'vexzian', 'dmitry067231@gmail.com', '79227074596', '$2y$10$SKKMOOJt9wjhh2kRcIxyhOdS21qE6Gks.FR7gFm40napl0MG9p.vW', 1, 0, 0, 'Russian', '2017-01-25 15:08:40', 'K;s00TVI:Y}Abwk{', 1, 0, 0, 0, ''),
(12, 'milliarderko', 'milliarderko@gmail.com', '79222220806', '$2y$10$52LQBhohG1/wRqkoQX61Gemdi99nOCynVSBiZ8knAdT66RbrJi5hK', 1, 0, 0, 'Russian', '2017-01-25 18:38:30', 'b?y]p:}OKt#H33l/', 1, 0, 1485876817, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `wallets`
--

CREATE TABLE IF NOT EXISTS `wallets` (
  `id_account` varchar(40) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `amount` decimal(11,8) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wallets`
--

INSERT INTO `wallets` (`id_account`, `address`, `amount`, `user_id`) VALUES
('547a132b-4bb4-51d9-a2ae-eaa1075560db', '1BTqQ4cYZ2nrfbNTeiwUmUibU5i6G3qM1o', '0.00000000', 1),
('5f73dbc1-8369-5886-ad35-04654e3b6c27', '1LMwGvZtRetJCYs834gdQdwynFgMS2YfWA', '0.00000000', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ads_agreements`
--
ALTER TABLE `ads_agreements`
  ADD PRIMARY KEY (`id_agr`);

--
-- Индексы таблицы `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id_advertisement`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Индексы таблицы `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_reserve`);

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id_msg`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id_account`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ads_agreements`
--
ALTER TABLE `ads_agreements`
  MODIFY `id_agr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id_advertisement` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
