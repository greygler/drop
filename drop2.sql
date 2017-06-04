-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2017 г., 20:04
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

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'ТВ ШОП'),
(2, 'Авто ТОВАР'),
(6, 'Здоровое питание');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

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
(22, 36, '1496151495', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(23, 36, '1496206552', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(24, 36, '1496298575', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(25, 36, '1496298626', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(26, 36, '1496298701', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(27, 36, '1496298740', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(28, 36, '1496298859', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(29, 36, '1496298967', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(30, 36, '1496299014', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(31, 36, '1496299138', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(32, 36, '1496299189', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(33, 36, '1496299283', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(34, 36, '1496299413', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(35, 36, '1496299603', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(36, 36, '1496299959', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(37, 36, '1496300640', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(38, 36, '1496316195', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(39, 36, '1496316869', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(40, 36, '1496316976', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(41, 36, '1496317101', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(42, 36, '1496317172', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(43, 36, '1496317280', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(44, 36, '1496317379', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(45, 36, '1496317423', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(46, 36, '1496317469', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(47, 36, '1496317498', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(48, 36, '1496317536', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(49, 36, '1496317588', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(50, 36, '1496317629', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(51, 36, '1496317691', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(52, 36, '1496318598', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(53, 36, '1496476228', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(54, 36, '1496476746', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(55, 36, '1496477491', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(56, 36, '1496477867', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(57, 36, '1496478057', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(58, 42, '1496556313', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(59, 36, '1496556354', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(60, 36, '1496556548', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(61, 36, '1496556817', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(62, 36, '1496556992', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(63, 36, '1496557051', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(64, 36, '1496557196', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(65, 36, '1496560078', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(66, 36, '1496560220', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(67, 36, '1496560302', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(68, 36, '1496560487', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(69, 36, '1496560545', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(70, 36, '1496560635', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(71, 36, '1496560799', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(72, 36, '1496560907', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(73, 36, '1496561036', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(74, 36, '1496561181', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(75, 36, '1496561259', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(76, 36, '1496561343', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(77, 36, '1496561466', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(78, 36, '1496561591', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(79, 36, '1496561704', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(80, 36, '1496561804', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(81, 36, '1496561871', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(82, 36, '1496561929', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(83, 36, '1496561973', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(84, 36, '1496562086', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(85, 36, '1496562317', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(86, 36, '1496562475', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(87, 36, '1496562599', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(88, 36, '1496562746', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(89, 36, '1496562829', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(90, 40, '1496562851', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(91, 36, '1496563128', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(92, 40, '1496563162', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(93, 40, '1496563224', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(94, 40, '1496563365', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(95, 43, '1496585101', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(96, 44, '1496585246', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(97, 45, '1496585279', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(98, 36, '1496587312', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(99, 40, '1496589868', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(100, 1, '1496590983', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(101, 36, '1496594419', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(102, 1, '1496594631', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(103, 1, '1496594827', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(104, 1, '1496595008', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0);

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
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `model` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `cat` int(11) NOT NULL,
  `subcat` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `spec_price` decimal(6,2) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `pic`, `name`, `model`, `description`, `cat`, `subcat`, `price`, `spec_price`, `active`) VALUES
(42, '', 'Шорты', '', '', 0, 1, '100.00', '100.00', 1),
(41, '', 'Smoking Lock', '', '', 0, 3, '399.00', '0.00', 1),
(40, '', 'Мультиварка ', 'Scarlett SC-411', '', 0, 5, '659.00', '0.00', 1),
(39, '', 'Babyliss плойка (не добавлять)', '', '', 0, 3, '0.00', '0.00', 1),
(38, '', 'Миксер для взбивания молока', '', '', 0, 5, '49.99', '0.00', 1),
(37, '', 'Овощерезка Nicer Dicer Plus Найсер Дайсер *1083*', '', '', 0, 5, '349.00', '0.00', 1),
(36, '', 'Фонарь с электрошокером Шерхан 1101 Police *1116*', '', '', 0, 3, '349.00', '0.00', 1),
(35, '', 'Взрослый велосипед', '', '', 0, 3, '0.00', '0.00', 1),
(34, '', 'Велосипед взрослый AZIMUT GAMMA 355 26', 'AZIMUT GAMMA 355 26', '', 0, 3, '2475.00', '0.00', 1),
(33, '', 'велосипед', 'AZIMUT REDHAWK 26', '', 0, 3, '1875.00', '0.00', 1),
(32, '', 'Shakeweight виброгантеля', '', '', 0, 3, '159.00', '0.00', 1),
(31, '', 'Xhose шланг 15 метров *1110*', '', '', 0, 4, '199.00', '0.00', 1),
(30, '', 'Xhose шланг 7,5 метров *1113*', '', '', 0, 4, '139.00', '0.00', 1),
(29, '', 'Xhose шланг 22,5 метров *1111*', '', '', 0, 4, '299.00', '0.00', 1),
(28, '', 'невидимый силиконовый бюсгалтер Un Bra *1159*', '', '', 0, 3, '199.00', '0.00', 1),
(27, '', 'Table Mate складной столик', '', '', 0, 3, '247.00', '0.00', 1),
(26, '', 'Магнитные шторы Magic Mesh *1063*', '', '', 0, 3, '199.00', '0.00', 1),
(25, '', 'Aquapel антидождь, антигрязь, антиблик и др. США ( не добавлять)', '', '', 0, 2, '0.00', '0.00', 1),
(24, '', 'Моделирующий крем для тела и ягодиц', '', '', 0, 3, '199.00', '0.00', 1),
(23, '', 'Видеорегистратор DOD F 900 LHD *1034*', '', '', 0, 2, '1087.00', '0.00', 1),
(22, '', 'Двухкамерный видеорегистратор  FULL HD DVR i1000', '', '', 0, 2, '787.00', '0.00', 1),
(21, '', 'Bust Salon Spa - крем для увеличения и подтяжки груди *1008*', '', '', 0, 3, '199.00', '0.00', 1),
(20, '', 'Антихрап 2шт (акция + браслет)', '', '', 0, 3, '99.00', '0.00', 1),
(19, '', 'Ягоды Годжи для похудения и оздоровления (не добавлять)', '', '', 0, 6, '0.00', '0.00', 1),
(18, '', 'Rolex Daytona мужские (кварц) *1123*', '', '', 0, 3, '485.00', '0.00', 1),
(17, '', 'Плойка для волос Babyliss Miracurl *1093*', '', '', 0, 3, '1299.00', '0.00', 1),
(16, '', 'Redmond RMC-4503 + книга рецептов', '', '', 0, 5, '799.00', '0.00', 1),
(15, '', 'Отбеливатель зубов White Light *1085*', '', '', 0, 3, '199.00', '0.00', 1),
(14, '', 'Шар-предсказатель Magic Ball 8', '', '', 0, 3, '99.00', '0.00', 1),
(13, '', 'Летающая фея Flying Fairy', '', '', 0, 3, '239.00', '0.00', 1),
(12, '', 'Riddex - отпугиватель грызунов и насекомых *1022*', '', '', 0, 3, '145.00', '0.00', 1),
(11, '', 'Lamzac', '', '', 0, 1, '1099.00', '0.00', 1),
(9, '', 'Pappilock от папилом', '', '', 0, 6, '349.00', '0.00', 1),
(8, '', 'Балери клачт тест', '', '', 0, 1, '0.00', '0.00', 1),
(7, '', 'Губная помада', 'Красная KA', 'Замечательная ГП, мин 1 корбка  48 шт', 0, 7, '500.00', '299.00', 1),
(6, '', 'DVD плеер', '34243', 'аввы ва ываыважыэважвы\r\nа эыва выа ыв\r\nаываы4ва \r\n4ыва\r\n 4ыв\r\nа 4ыв\r\nа4 ы\r\nваыв а вы', 0, 1, '1580.00', '0.00', 1),
(4, '', 'AQUAPHOB (ТЕСТ)', '', 'aquaphobcomua@gmail.com', 0, 3, '0.00', '0.00', 1),
(3, '', 'botomax', '', '', 0, 3, '359.00', '0.00', 1),
(2, '', 'браслет Power Balance', '', '', 0, 3, '299.00', '0.00', 1),
(1, '', 'Видерегистратор FULL HD  K6000', 'K6000', 'Камера: 5 мп\r\nМаксимальное разрешение видео: 1920х1080\r\n2.7-дюймовый экран\r\nУгол обзора 140°\r\nВстроенный датчик движения\r\n4х цифровой зум\r\nG-сенсор \r\nВстроенная литиевая баттарея\r\nВозможность использования в качестве WEB-камеры\r\nПоддержка карт памяти до 32 Гб\r\nВ комплекте: кронштейн-присоска на лобовое стекло, автомобильный адаптер питания, USB-кабель, инструкция \r\nЦвет: черный', 0, 2, '1074.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `phone` varchar(20) NOT NULL,
  `v_phone` varchar(20) NOT NULL,
  `sms` varchar(10) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `password`, `drop_key`, `balance`, `phone`, `skype`, `wm`, `total_balance`, `sale`, `total_sale`, `sale_ok`, `last_time`, `ipv4`, `country`, `region`, `city`, `agent`, `device`, `last_enter`) VALUES
(1, '1495644820', 3, 'Игорь', 'igor.sayutin@gmail.com', '1c40671124502abb891ece8b9674dba3', 'cee7fee8f7c25b0726184946aeb756cf', '1500.00', '+38(050) 478-42-74', 'igor.sayutin', 'WMU34234234345345', '2800.00', 0, 12, 12, '1496395577', '130.180.219.249', 'UA', 'Одесская область', 'Одесса', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:12:"46.133.88.25";s:9:"last_time";s:10:"1496331782";s:7:"country";s:2:"UA";s:4:"city";s:8:"Киев";s:6:"region";s:8:"Киев";s:5:"agent";s:102:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(2, '1495644961', 2, 'Вадим', 'slogger1990@gmail.com', 'c7e70f8844321ca123b4839bd581f644', 'a428b2b328cf4397b62b173eb6c0c10f', '100.00', NULL, NULL, NULL, '200.00', NULL, NULL, NULL, '', '', '', '', '', '', 0, ''),
(5, '1495877000', 2, 'Panakshev', 'vpanakshev1@mail.ua', '778e7d704a943d8654ad8883154c2b84', '31c8ed1f2e7496a59f5cb525263eca66', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 0, ''),
(4, '1495691400', 1, 'Артур', 'new-day2012@mail.ru', '4aa026d492e2645669254e7c655cc3ac', '3d20280a6888ea60528bf5b2c5d7fe90', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 0, ''),
(6, '1496221566', 3, 'webmasterCRM', 'test1234@binka.me', 'e10adc3949ba59abbe56e057f20f883e', '7a7c71c8e9ac0b782a11f7ace1fb3353', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1496221889', '178.213.0.225', 'UA', 'Днепропетровская область', 'Кривой Рог', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:13:"178.213.0.225";s:9:"last_time";s:10:"1496221566";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:5:"agent";s:114:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(7, '1495644820', 5, 'Просто Вася', 'dxfg2@qwe.ert', 'd58e3582afa99040e27b92b13c8f2280', '35f95c819e9b6bd6464a7fab6898b5f3', '-20.00', NULL, NULL, NULL, '50.00', 3, 6, 3, '1496258763', '88.135.228.244', 'UA', 'Днепропетровская область', 'Кривой Рог', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:14:"88.135.228.244";s:9:"last_time";s:10:"1496258527";s:7:"country";s:2:"UA";s:4:"city";s:19:"Кривой Рог";s:6:"region";s:47:"Днепропетровская область";s:5:"agent";s:102:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}');

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
(3, 'Программист', 'fa-linux', 'fa-code'),
(5, 'Пользователь', 'fa-user-circle', 'fa-user'),
(6, 'Пользователь (предоплата)', 'fa-user-circle', 'fa-credit-card'),
(7, 'Пользователь (ок)', 'fa-user-circle', 'fa-id-badge');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
