-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 30 2017 г., 20:11
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
-- Структура таблицы `enter_log`
--

CREATE TABLE IF NOT EXISTS `enter_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_time` varchar(11) NOT NULL,
  `ipv4` varchar(20) NOT NULL,
  `country` varchar(2) NOT NULL,
  `region` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `agent` varchar(256) NOT NULL,
  `device` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `enter_log`
--

INSERT INTO `enter_log` (`id`, `user_id`, `last_time`, `ipv4`, `country`, `region`, `city`, `agent`, `device`) VALUES
(1, 36, '1496130822', 'localhost', '', '', 'не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(2, 36, '1496130884', 'localhost', '', '', 'не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(3, 36, '1496131539', 'localhost', '', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(4, 36, '1496131877', 'localhost', '', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(5, 36, '1496131877', 'localhost', '', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(6, 36, '1496132112', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(7, 36, '1496132206', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(8, 36, '1496132469', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(9, 36, '1496132634', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(10, 40, '1496132950', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(11, 41, '1496133012', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(12, 36, '1496134513', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(13, 36, '1496134664', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(14, 36, '1496134810', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(15, 36, '1496134838', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(16, 36, '1496135687', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(17, 36, '1496136737', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(18, 36, '1496141587', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(19, 36, '1496141707', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(20, 36, '1496148088', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(21, 36, '1496148226', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(22, 36, '1496151495', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0);

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
-- Структура таблицы `order_tab`
--

CREATE TABLE IF NOT EXISTS `order_tab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(12) NOT NULL,
  `order_time` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `country` varchar(2) NOT NULL,
  `bayer_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `count` int(11) NOT NULL,
  `profit` decimal(6,2) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `order_tab`
--

INSERT INTO `order_tab` (`id`, `user_id`, `order_id`, `order_time`, `status`, `country`, `bayer_name`, `phone`, `product_id`, `price`, `count`, `profit`, `comment`, `site`, `ip`, `delivery_adress`, `utm_source`, `utm_medium`, `utm_term`, `utm_content`, `utm_campaign`) VALUES
(1, 36, '2147483647', '1496159000', 3, 'UA', 'тест-игорь', 'dfsdfsdfsdf', 0, '0.00', 0, '0.00', '', 'hernya', '127.0.0.1', '', '', '', '', '', ''),
(2, 36, '2147483648', '1496159300', 3, 'UA', 'тест-игорь', 'dfsdfsdfsdf', 0, '0.00', 0, '0.00', '', 'hernya', '127.0.0.1', '', '', '', '', '', ''),
(3, 36, '2147483649', '1496159345', 3, 'UA', 'тест-игорь', 'dfsdfsdfsdf', 0, '0.00', 0, '0.00', '', 'hernya', '127.0.0.1', '', '', '', '', '', ''),
(4, 36, '2147483650', '1496159650', 3, 'UA', 'тест-игорь', 'dfsdfsdfsdf', 0, '0.00', 0, '0.00', '', 'hernya', '127.0.0.1', '', '', '', '', '', '');

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
  `last_time` varchar(11) NOT NULL,
  `ipv4` varchar(20) NOT NULL,
  `country` varchar(2) NOT NULL,
  `region` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `agent` varchar(256) NOT NULL,
  `device` tinyint(1) NOT NULL,
  `last_enter` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `phone`, `skype`, `wm`, `password`, `drop_key`, `balance`, `total_balance`, `sale`, `total_sale`, `sale_ok`, `last_time`, `ipv4`, `country`, `region`, `city`, `agent`, `device`, `last_enter`) VALUES
(1, '1495724487', 5, '45y7gddfg', 'dxfg@qwe.ert', '+38(111)111-11-11', 'Skype_user', 'U2232123123123', '202cb962ac59075b964b07152d234b70', '85e4dfee1a6ad74b851a3263967eb379', '7.00', '120.00', 1, 5, 3, '', '', '', '', '', '', 0, ''),
(2, '1495724706', 1, '45y7gddfg5', 'dxfg1@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', '2fb7b5f574ac3caaca8eb3f5d085ae99', '-20.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(3, '1495725483', 1, 'wqeqwe', 'dxfg3@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'ed9dd85f95caf38432d5fe3a8558aa02', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(4, '1495726261', 1, 'wqeqew', 'dxfg4@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', '68b1e5a482a4522677e32719daf1ea73', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(5, '1495726298', 2, 'Проверка наличия', 'dxfg6@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'eed55d95cdefa7933764324d919e670e', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(6, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'ertertertert', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(7, '1495724487', 2, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '', '', '', 'd9b25478896b77ae97ba017bc979bd26', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(8, '1495724487', 5, 'szdgfzsgdg', 'dxfg9@qwe.ert', '', '', '', 'd58e3582afa99040e27b92b13c8f2280', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(9, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(10, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(11, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(12, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(13, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(14, '1495724487', 5, 'Пользователь', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(15, '1495724487', 5, 'Управляющий', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(16, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(17, '1495724487', 0, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(18, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(19, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(20, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(21, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(22, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(23, '1495724487', 0, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(24, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(25, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(26, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(27, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(28, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(29, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(30, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(31, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(32, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(33, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(34, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(35, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(36, '1495727078', 1, 'Игорь', 'igor.sayutin@gmail.com', '+38(050) 478-42-74', 'igor.sayutin', 'sdfkjsdkl;fjsdf', '1c40671124502abb891ece8b9674dba3', '4926bc853c7c4ac9ecf1906d37232260', '-30.00', '0.00', 0, 0, 0, '1496151495', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496148226";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(37, '1495984300', 5, 'Открытый SSH-ключ', 'dxfg54@qwe.ert', '+38(050)123-456-789', 'Super_Skype', 'U3234234234234', '202cb962ac59075b964b07152d234b70', 'ec23a01df3b7e172adbfe6efa092d509', '-25.00', '-1230.00', 3, 8, -4, '', '', '', '', '', '', 0, ''),
(38, '1496079345', 2, 'тест-игорь', 'dxfg58@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'e75a9c78e2dee5dd3e7b6ea57745d8a5', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(39, '1496132914', 2, 'sdrdrgdfg', 'dxfg545@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'c89f5b801e7f32a710dcfc62a2322c2b', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(40, '1496132950', 2, 'sdrdrgdfg', 'dxfg546@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', '9f6ff36f6d0a94878e1315a51941f072', '0.00', '0.00', 0, 0, 0, '1496132950', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(41, '1496133012', 5, 'sdrdrgdfg', 'dxfg547@qwe.ert', '', '', '', '202cb962ac59075b964b07152d234b70', 'a624f86779630e2d8b38aa3f529ea1a1', '0.00', '0.00', 0, 0, 0, '1496133012', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, '');

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
