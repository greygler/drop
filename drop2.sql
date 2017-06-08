-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 08 2017 г., 13:26
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
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--


--
-- Структура таблицы `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `fa_symbol` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `name`, `fa_symbol`) VALUES
(1, 'Skype', 'fa-skype '),
(2, 'Viber', 'fa-tty '),
(3, 'Telegram', 'fa-telegram'),
(4, 'WhatsApp', 'fa-whatsapp');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;


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
-- Структура таблицы `pay_method`
--

CREATE TABLE IF NOT EXISTS `pay_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `pay_method`
--

INSERT INTO `pay_method` (`id`, `name`, `active`) VALUES
(1, 'Карта Приват-банка', 1),
(2, 'WMU', 1),
(3, 'WMR', 0),
(4, 'WMZ', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `model` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `manufacturer` tinyint(4) NOT NULL,
  `cat` int(11) NOT NULL,
  `subcat` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `spec_price` decimal(6,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategories`
--


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
  `v_email` varchar(100) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `v_phone` varchar(22) NOT NULL,
  `sms` varchar(10) NOT NULL,
  `contact` text NOT NULL,
  `pay_method` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `drop_key` varchar(50) NOT NULL,
  `active_drop` tinyint(4) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `total_balance` decimal(10,2) NOT NULL,
  `order_pay` decimal(10,2) NOT NULL,
  `order_pay_method` tinyint(4) NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `users`
--



INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `v_email`, `phone`, `v_phone`, `sms`, `contact`, `pay_method`, `password`, `drop_key`, `active_drop`, `balance`, `total_balance`, `sale`, `total_sale`, `sale_ok`, `last_time`, `ipv4`, `country`, `region`, `city`, `agent`, `device`, `last_enter`) VALUES
(1, '1495644820', 3, 'Игорь', 'igor.sayutin@gmail.com', '', '+38(004) 565-46-54', '+38(004) 565-46-54', '', 'igor.sayutin', 'WMU34234234345345', '1c40671124502abb891ece8b9674dba3', 'cee7fee8f7c25b0726184946aeb756cf', 0, '1500.00', '2800.00', 0, 12, 12, '1496901956', '193.151.13.51', 'UA', 'Днепропетровская область', 'Кривой Рог', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:13:"193.151.13.51";s:9:"last_time";s:10:"1496867852";s:7:"country";s:2:"UA";s:4:"city";s:19:"Кривой Рог";s:6:"region";s:47:"Днепропетровская область";s:5:"agent";s:102:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(2, '1495644961', 2, 'Вадим', 'slogger1990@gmail.com', '', '', '', '', '', '', 'c7e70f8844321ca123b4839bd581f644', 'a428b2b328cf4397b62b173eb6c0c10f', 0, '100.00', '200.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(5, '1495877000', 2, 'Panakshev', 'vpanakshev1@mail.ua', '', '', '', '', '', '', '778e7d704a943d8654ad8883154c2b84', '31c8ed1f2e7496a59f5cb525263eca66', 0, '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(4, '1495691400', 1, 'Артур', 'new-day2012@mail.ru', '', '', '', '', '', '', '4aa026d492e2645669254e7c655cc3ac', '3d20280a6888ea60528bf5b2c5d7fe90', 0, '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(6, '1496221566', 3, 'webmasterCRM', 'test1234@binka.me', '', '', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '7a7c71c8e9ac0b782a11f7ace1fb3353', 0, '0.00', '0.00', 0, 0, 0, '1496221889', '178.213.0.225', 'UA', 'Днепропетровская область', 'Кривой Рог', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:13:"178.213.0.225";s:9:"last_time";s:10:"1496221566";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:5:"agent";s:114:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(7, '1495644820', 6, 'Просто Вася', 'dxfg2@qwe.ert', '', '', '', '', '', '', 'd58e3582afa99040e27b92b13c8f2280', '35f95c819e9b6bd6464a7fab6898b5f3', 0, '-20.00', '50.00', 3, 6, 3, '1496258763', '88.135.228.244', 'UA', 'Днепропетровская область', 'Кривой Рог', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:14:"88.135.228.244";s:9:"last_time";s:10:"1496258527";s:7:"country";s:2:"UA";s:4:"city";s:19:"Кривой Рог";s:6:"region";s:47:"Днепропетровская область";s:5:"agent";s:102:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}');

-- --------------------------------------------------------

--
-- Структура таблицы `users_group`
--

CREATE TABLE IF NOT EXISTS `users_group` (
  `id_group` int(11) NOT NULL,
  `name_group` varchar(50) NOT NULL,
  `fa_logo` varchar(25) NOT NULL,
  `fa_user` varchar(25) NOT NULL,
  `payment` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_group`
--

INSERT INTO `users_group` (`id_group`, `name_group`, `fa_logo`, `fa_user`, `payment`) VALUES
(0, 'Заблокирован', 'fa-ban', 'fa-ban', 0),
(1, 'Администратор', 'fa-trophy', 'fa-diamond', 1),
(2, 'Управляющий', 'fa-line-chart', 'fa-star', 1),
(3, 'Программист', 'fa-linux', 'fa-code', 1),
(5, 'Пользователь', 'fa-user-circle', 'fa-user', 1),
(6, 'Пользователь (предоплата)', 'fa-user-circle', 'fa-credit-card', 2),
(7, 'Пользователь (ок)', 'fa-user-circle', 'fa-id-badge', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
