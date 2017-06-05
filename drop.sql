-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 05 2017 г., 17:10
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

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
(104, 1, '1496595008', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(105, 36, '1496667388', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0);

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
  `manufacturer` tinyint(4) NOT NULL,
  `cat` int(11) NOT NULL,
  `subcat` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `spec_price` decimal(6,2) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `pic`, `name`, `model`, `description`, `manufacturer`, `cat`, `subcat`, `price`, `spec_price`, `active`) VALUES
(42, '', 'Шорты', '', '', 0, 1, 0, '100.00', '100.00', 1),
(41, '', 'Smoking Lock', '', '', 0, 1, 3, '399.00', '0.00', 1),
(40, '', 'Мультиварка ', 'Scarlett SC-411', '', 0, 1, 5, '659.00', '0.00', 1),
(39, '', 'Babyliss плойка (не добавлять)', '', '', 0, 1, 3, '0.00', '0.00', 1),
(38, '', 'Миксер для взбивания молока', '', '', 0, 1, 5, '49.99', '0.00', 1),
(37, '', 'Овощерезка Nicer Dicer Plus Найсер Дайсер *1083*', '', '', 0, 1, 5, '349.00', '0.00', 1),
(36, '', 'Фонарь с электрошокером Шерхан 1101 Police *1116*', '', '', 0, 1, 3, '349.00', '0.00', 1),
(35, '', 'Взрослый велосипед', '', '', 0, 1, 3, '0.00', '0.00', 1),
(34, '', 'Велосипед взрослый AZIMUT GAMMA 355 26', 'AZIMUT GAMMA 355 26', '', 0, 1, 3, '2475.00', '0.00', 1),
(33, '', 'велосипед', 'AZIMUT REDHAWK 26', '', 0, 1, 3, '1875.00', '0.00', 1),
(32, '', 'Shakeweight виброгантеля', '', '', 0, 1, 3, '159.00', '0.00', 1),
(31, '', 'Xhose шланг 15 метров *1110*', '', '', 0, 1, 4, '199.00', '0.00', 1),
(30, '', 'Xhose шланг 7,5 метров *1113*', '', '', 0, 1, 4, '139.00', '0.00', 1),
(29, '', 'Xhose шланг 22,5 метров *1111*', '', '', 0, 1, 4, '299.00', '0.00', 1),
(28, '', 'невидимый силиконовый бюсгалтер Un Bra *1159*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(27, '', 'Table Mate складной столик', '', '', 0, 1, 3, '247.00', '0.00', 1),
(26, '', 'Магнитные шторы Magic Mesh *1063*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(25, '', 'Aquapel антидождь, антигрязь, антиблик и др. США ( не добавлять)', '', '', 0, 2, 0, '0.00', '0.00', 1),
(24, '', 'Моделирующий крем для тела и ягодиц', '', '', 0, 1, 3, '199.00', '0.00', 1),
(23, '', 'Видеорегистратор DOD F 900 LHD *1034*', '', '', 0, 2, 0, '1087.00', '0.00', 1),
(22, '', 'Двухкамерный видеорегистратор  FULL HD DVR i1000', '', '', 0, 2, 0, '787.00', '0.00', 1),
(21, '', 'Bust Salon Spa - крем для увеличения и подтяжки груди *1008*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(20, '', 'Антихрап 2шт (акция + браслет)', '', '', 0, 1, 3, '99.00', '0.00', 1),
(19, '', 'Ягоды Годжи для похудения и оздоровления (не добавлять)', '', '', 0, 6, 0, '0.00', '0.00', 1),
(18, '', 'Rolex Daytona мужские (кварц) *1123*', '', '', 0, 1, 3, '485.00', '0.00', 1),
(17, '', 'Плойка для волос Babyliss Miracurl *1093*', '', '', 0, 1, 3, '1299.00', '0.00', 1),
(16, '', 'Redmond RMC-4503 + книга рецептов', '', '', 0, 1, 5, '799.00', '0.00', 1),
(15, '', 'Отбеливатель зубов White Light *1085*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(14, '', 'Шар-предсказатель Magic Ball 8', '', '', 0, 1, 3, '99.00', '0.00', 1),
(13, '', 'Летающая фея Flying Fairy', '', '', 0, 1, 3, '239.00', '0.00', 1),
(12, '', 'Riddex - отпугиватель грызунов и насекомых *1022*', '', '', 0, 1, 3, '145.00', '0.00', 1),
(11, '', 'Lamzac', '', '', 0, 1, 0, '1099.00', '0.00', 1),
(9, '', 'Pappilock от папилом', '', '', 0, 6, 0, '349.00', '0.00', 1),
(8, '', 'Балери клачт тест', '', '', 0, 1, 0, '0.00', '0.00', 1),
(7, '', 'Губная помада', 'Красная KA', 'Замечательная ГП, мин 1 корбка  48 шт', 0, 6, 7, '500.00', '299.00', 1),
(6, '', 'DVD плеер', '34243', 'аввы ва ываыважыэважвы\r\nа эыва выа ыв\r\nаываы4ва \r\n4ыва\r\n 4ыв\r\nа 4ыв\r\nа4 ы\r\nваыв а вы', 0, 1, 0, '1580.00', '0.00', 1),
(4, '', 'AQUAPHOB (ТЕСТ)', '', 'aquaphobcomua@gmail.com', 0, 1, 3, '0.00', '0.00', 1),
(3, '', 'botomax', '', '', 0, 1, 3, '359.00', '0.00', 1),
(2, '', 'браслет Power Balance', '', '', 0, 1, 3, '299.00', '0.00', 1),
(1, '', 'Видерегистратор FULL HD  K6000', 'K6000', 'Камера: 5 мп\r\nМаксимальное разрешение видео: 1920х1080\r\n2.7-дюймовый экран\r\nУгол обзора 140°\r\nВстроенный датчик движения\r\n4х цифровой зум\r\nG-сенсор \r\nВстроенная литиевая баттарея\r\nВозможность использования в качестве WEB-камеры\r\nПоддержка карт памяти до 32 Гб\r\nВ комплекте: кронштейн-присоска на лобовое стекло, автомобильный адаптер питания, USB-кабель, инструкция \r\nЦвет: черный', 0, 2, 0, '1074.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `parent`, `name`) VALUES
(3, 1, 'Для дома'),
(4, 1, 'Для сада'),
(5, 1, 'Для кухни'),
(7, 6, 'Травяной чай');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `v_email`, `phone`, `v_phone`, `sms`, `skype`, `wm`, `password`, `drop_key`, `balance`, `total_balance`, `sale`, `total_sale`, `sale_ok`, `last_time`, `ipv4`, `country`, `region`, `city`, `agent`, `device`, `last_enter`) VALUES
(1, '1495724487', 7, '45y7gddfg', 'dxfg@qwe.ert', '0', '+38(011) 143-14-17', '+38(011) 142-14-17', '', 'Skype_user', 'U2232123123123', '202cb962ac59075b964b07152d234b70', '85e4dfee1a6ad74b851a3263967eb379', '7.00', '120.00', 1, 5, 3, '1496595008', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496594827";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(2, '1495724706', 7, '45y7gddfg5', 'dxfg1@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', '2fb7b5f574ac3caaca8eb3f5d085ae99', '-20.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(3, '1495725483', 2, 'wqeqwe', 'dxfg3@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'ed9dd85f95caf38432d5fe3a8558aa02', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(4, '1495726261', 2, 'wqeqew', 'dxfg4@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', '68b1e5a482a4522677e32719daf1ea73', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(5, '1495726298', 6, 'Проверка наличия', 'dxfg6@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'eed55d95cdefa7933764324d919e670e', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(6, '1495724487', 7, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'ertertertert', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(7, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '0', '', '0', '', '', '', 'd9b25478896b77ae97ba017bc979bd26', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(8, '1495724487', 5, 'szdgfzsgdg', 'dxfg9@qwe.ert', '0', '', '0', '', '', '', 'd58e3582afa99040e27b92b13c8f2280', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(9, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(10, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(11, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(12, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(13, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(14, '1495724487', 5, 'Пользователь', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(15, '1495724487', 5, 'Управляющий', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(16, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(17, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(18, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(19, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(20, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(21, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(22, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(23, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(24, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(25, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(26, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(27, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(28, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(29, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(30, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(31, '1495724487', 6, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(32, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(33, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(34, '1495724487', 6, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(35, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(36, '1495727078', 1, 'Игорь', 'igor.sayutin@gmail.com', 'igor.sayutin@gmail.com', '+38(050) 478-42-74', '+38(050) 478-42-74', '', 'igor.sayutin', 'sdfkjsdkl;fjsdf', '71b3b26aaa319e0cdf6fdb8429c112b0', '4926bc853c7c4ac9ecf1906d37232260', '-30.00', '0.00', 0, 0, 0, '1496667388', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496594419";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(37, '1495984300', 1, 'Открытый SSH-ключ', 'dxfg54@qwe.ert', '0', '+38(050)123-456-789', '0', '', 'Super_Skype', 'U3234234234234', '202cb962ac59075b964b07152d234b70', 'ec23a01df3b7e172adbfe6efa092d509', '-25.00', '-1230.00', 3, 8, -4, '', '', '', '', '', '', 0, ''),
(38, '1496079345', 5, 'тест-игорь', 'dxfg58@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'e75a9c78e2dee5dd3e7b6ea57745d8a5', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(39, '1496132914', 5, 'sdrdrgdfg', 'dxfg545@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'c89f5b801e7f32a710dcfc62a2322c2b', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', '', 0, ''),
(40, '1496132950', 5, 'sdrdrgdfg', 'dxfg546@qwe.ert', 'dxfg546@qwe.ert', '+38(045) 654-65-46', '+38(045) 654-65-46', '', '', '', '202cb962ac59075b964b07152d234b70', '9f6ff36f6d0a94878e1315a51941f072', '0.00', '0.00', 0, 0, 0, '1496589868', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496563365";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(41, '1496133012', 5, 'sdrdrgdfg', 'dxfg547@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'a624f86779630e2d8b38aa3f529ea1a1', '0.00', '0.00', 0, 0, 0, '1496133012', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(42, '1496556313', 6, 'Просто Вася', 'dxfg549@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', '9d7cb3f151e08b84cdc1c5ddf06e7087', '0.00', '0.00', 0, 0, 0, '1496556313', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(43, '1496585101', 6, 'тест-игорь', 'dxfg5467@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', '26c689bec410f36a618512af73834648', '0.00', '0.00', 0, 0, 0, '1496585101', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(44, '1496585246', 6, 'sdrdrgdfg', 'dxfg548@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', '91f4c0830d9ad20bd42c2325a94c03a3', '0.00', '0.00', 0, 0, 0, '1496585246', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(45, '1496585279', 6, '45y7gddfg', 'dxfg546645@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 'b6ea912bb19d975c1981a0e4bec33d5f', '0.00', '0.00', 0, 0, 0, '1496585279', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, '');

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
