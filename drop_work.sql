-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 29 2017 г., 21:07
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
  `phone` varchar(20) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `wm` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `drop_key` varchar(50) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `total_balance` decimal(10,2) NOT NULL,
  `sale` int(11) NOT NULL,
  `total_sale` int(11) NOT NULL,
  `sale_ok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `phone`, `skype`, `wm`, `password`, `drop_key`, `balance`, `total_balance`, `sale`, `total_sale`, `sale_ok`) VALUES
(1, '1495724487', 2, '45y7gddfg', 'dxfg@qwe.ert', '+38(111)111-11-11', 'Skype_user', 'U2232123123123', '202cb962ac59075b964b07152d234b70', '85e4dfee1a6ad74b851a3263967eb379', '7.00', '120.00', 1, 5, 3),
(2, '1495724706', 1, '45y7gddfg5', 'dxfg1@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', '2fb7b5f574ac3caaca8eb3f5d085ae99', '-20.00', '0.00', 0, 0, 0),
(3, '1495725483', 1, 'wqeqwe', 'dxfg3@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'ed9dd85f95caf38432d5fe3a8558aa02', '0.00', '0.00', 0, 0, 0),
(4, '1495726261', 2, 'wqeqew', 'dxfg4@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', '68b1e5a482a4522677e32719daf1ea73', '0.00', '0.00', 0, 0, 0),
(5, '1495726298', 2, 'Проверка наличия', 'dxfg6@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'eed55d95cdefa7933764324d919e670e', '0.00', '0.00', 0, 0, 0),
(6, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'ertertertert', '', '0.00', '0.00', 0, 0, 0),
(7, '1495724487', 2, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '', '', '', 'd9b25478896b77ae97ba017bc979bd26', '', '0.00', '0.00', 0, 0, 0),
(8, '1495724487', 5, 'szdgfzsgdg', 'dxfg9@qwe.ert', '', '', '', 'd58e3582afa99040e27b92b13c8f2280', '', '0.00', '0.00', 0, 0, 0),
(9, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(10, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(11, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(12, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(13, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(14, '1495724487', 5, 'Пользователь', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(15, '1495724487', 5, 'Управляющий', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(16, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(17, '1495724487', 0, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(18, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(19, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(20, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(21, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(22, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(23, '1495724487', 0, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(24, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(25, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(26, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(27, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(28, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(29, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(30, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(31, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(32, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(33, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(34, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0),
(35, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0),
(36, '1495727078', 1, 'Игорь', 'igor.sayutin@gmail.com', '', '', '', '1c40671124502abb891ece8b9674dba3', '4926bc853c7c4ac9ecf1906d37232260', '0.00', '0.00', 0, 0, 0),
(37, '1495984300', 5, 'Открытый SSH-ключ', 'dxfg54@qwe.ert', '+38(050)123-456-789', 'Super_Skype', 'U3234234234234', '202cb962ac59075b964b07152d234b70', 'ec23a01df3b7e172adbfe6efa092d509', '-25.00', '-1230.00', 3, 8, -4),
(38, '1496079345', 2, 'тест-игорь', 'dxfg58@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'e75a9c78e2dee5dd3e7b6ea57745d8a5', '0.00', '0.00', 0, 0, 0);

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
