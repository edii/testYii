-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 24 2015 г., 13:33
-- Версия сервера: 5.5.44
-- Версия PHP: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_emails`
--

CREATE TABLE `tbl_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_emails`
--

INSERT INTO `tbl_emails` (`id`, `email`, `create_time`, `update_time`) VALUES
(11, 'ad@gmail.com', '2015-11-24 13:17:48', '2015-11-24 13:18:51'),
(12, 'edii87shadow@gmail.com', '2015-11-24 13:30:34', '2015-11-24 13:30:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbl_emails`
--
ALTER TABLE `tbl_emails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_emails`
--
ALTER TABLE `tbl_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
