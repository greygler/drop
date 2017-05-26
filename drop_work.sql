-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2017 г., 14:30
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `drop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(15) NOT NULL,
  `subj` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `subj`, `text`) VALUES
(1, '1495298658', '1 версия', 'Начались работы 1 версии ДРОП');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `country` varchar(2) NOT NULL,
  `bayer_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `site` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `delivery_adress` varchar(256) NOT NULL,
  `utm_source` varchar(50) NOT NULL,
  `utm_medium` varchar(50) NOT NULL,
  `utm_term` varchar(50) NOT NULL,
  `utm_content` varchar(50) NOT NULL,
  `utm_campaign` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` varchar(12) NOT NULL,
  `users_group` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `drop_key` varchar(50) NOT NULL,
  `balance` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `password`, `drop_key`, `balance`) VALUES
(1, '1495724487', 5, '45y7gddfg', 'dxfg@qwe.ert', '202cb962ac59075b964b07152d234b70', '85e4dfee1a6ad74b851a3263967eb379', '0.00'),
(2, '1495724706', 5, '45y7gddfg5', 'dxfg1@qwe.ert', '202cb962ac59075b964b07152d234b70', '2fb7b5f574ac3caaca8eb3f5d085ae99', '0.00'),
(3, '1495725483', 5, 'wqeqwe', 'dxfg3@qwe.ert', '202cb962ac59075b964b07152d234b70', 'ed9dd85f95caf38432d5fe3a8558aa02', '0.00'),
(4, '1495726261', 5, 'wqeqew', 'dxfg4@qwe.ert', '202cb962ac59075b964b07152d234b70', '68b1e5a482a4522677e32719daf1ea73', '0.00'),
(5, '1495726298', 5, 'Проверка наличия', 'dxfg6@qwe.ert', '202cb962ac59075b964b07152d234b70', 'eed55d95cdefa7933764324d919e670e', '0.00'),
(6, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'd58e3582afa99040e27b92b13c8f2280', '', '0.00'),
(7, '1495724487', 0, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', 'd9b25478896b77ae97ba017bc979bd26', '', '0.00'),
(8, '1495724487', 5, 'szdgfzsgdg', 'dxfg9@qwe.ert', 'd58e3582afa99040e27b92b13c8f2280', '', '0.00'),
(9, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(10, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(11, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(12, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(13, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(14, '1495724487', 5, 'Пользователь', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(15, '1495724487', 5, 'Управляющий', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(16, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(17, '1495724487', 0, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(18, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(19, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', 'ghfghfgh', '', '0.00'),
(20, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(21, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(22, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(23, '1495724487', 0, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', 'ghfghfgh', '', '0.00'),
(24, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(25, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(26, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(27, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(28, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(29, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(30, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(31, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(32, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(33, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(34, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', 'sdfsdf', '', '0.00'),
(35, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', 'ghfghfgh', '', '0.00'),
(36, '1495727078', 2, 'Игорь', 'igor.sayutin@gmail.com', '1c40671124502abb891ece8b9674dba3', '4926bc853c7c4ac9ecf1906d37232260', '0.00');

-- --------------------------------------------------------

--
-- Структура таблицы `users_group`
--

CREATE TABLE IF NOT EXISTS `users_group` (
  `id_group` int(11) NOT NULL,
  `name_group` varchar(50) NOT NULL,
  `fa_logo` varchar(25) NOT NULL,
  `fa_user` varchar(25) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_group`
--

INSERT INTO `users_group` (`id_group`, `name_group`, `fa_logo`, `fa_user`) VALUES
(0, 'Заблокирован', 'fa-ban', 'fa-ban'),
(1, 'Администратор', 'fa-trophy', 'fa-diamond'),
(2, 'Управляющий', 'fa-line-chart', 'fa-star'),
(5, 'Пользователь', 'fa-user-circle', 'fa-user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
