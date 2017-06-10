-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 10 2017 г., 22:38
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
-- Структура таблицы `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `fa_symbol` varchar(50) NOT NULL,
  `phone` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `name`, `fa_symbol`, `phone`) VALUES
(1, 'Skype', 'fa-skype ', 0),
(2, 'Viber', 'fa-tty ', 1),
(3, 'Telegram', 'fa-telegram', 0),
(4, 'WhatsApp', 'fa-whatsapp', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121 ;

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
(105, 36, '1496667388', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(106, 40, '1496839509', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(107, 40, '1496841571', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(108, 37, '1496841587', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(109, 36, '1496907492', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(110, 36, '1496918571', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(111, 1, '1496937466', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(112, 1, '1496943456', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(113, 1, '1496943459', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(114, 1, '1496944654', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(115, 37, '1496994229', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(116, 51, '1496994243', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(117, 1, '1497015193', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(118, 51, '1497015219', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(119, 1, '1497017990', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(120, 1, '1497079585', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(15) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `pic`, `text`) VALUES
(1, '1495298658', '', 'Начались работы 1 версии ДРОП'),
(2, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(3, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(4, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(5, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(6, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(7, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(8, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(9, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(10, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(11, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(12, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(13, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(14, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(15, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(16, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(17, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(18, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(19, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(20, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(21, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(22, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(23, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(24, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.'),
(25, '1495298658', '', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.');

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
(1, 36, '2147483647', '1496159000', 3, 'UA', 'тест-игорь', '+38(000) 000-00-00', 1, '1500.00', 1, '10.00', '', 'hernya', '127.0.0.1', '', 'utm_source', '', 'utm_term', 'utm_content', 'utm_campaign'),
(2, 36, '2147483648', '1496159300', 3, 'UA', 'тест-игорь', '+38(000) 000-00-00', 2, '500.00', 2, '20.00', '', 'hernya', '127.0.0.1', '', 'utm_source', 'utm_medium', '', '', 'utm_campaign'),
(3, 7, '2147483649', '1496159345', 3, 'UA', 'тест-вася', '+38(000) 000-00-00', 3, '500.00', 1, '-70.00', '', 'hernya', '127.0.0.1', '', 'utm_source', 'utm_medium', '', 'utm_content', 'utm_campaign'),
(4, 36, '2147483650', '1496159650', 3, 'UA', 'тест-игорь', '+38(000) 000-00-00', 4, '20.00', 1, '0.00', '', 'hernya', '127.0.0.1', '', 'utm_source', '', 'utm_term', '', 'utm_campaign');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_method`
--

CREATE TABLE IF NOT EXISTS `pay_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `cart` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `pay_method`
--

INSERT INTO `pay_method` (`id`, `name`, `active`, `cart`) VALUES
(1, 'Карта Приват-банка', 1, 'c'),
(2, 'WMU', 1, 'u'),
(3, 'WMR', 0, 'r'),
(4, 'WMZ', 0, 'z'),
(5, 'Яндекс-деньги', 0, '0'),
(6, 'Qiwi', 0, '0');

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

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `pic`, `name`, `model`, `description`, `manufacturer`, `cat`, `subcat`, `price`, `spec_price`, `active`) VALUES
(1, '1ec6d1aa6eed9c971fa9b23be7f78883.png', 'Видерегистратор FULL HD  K6000', 'K6000', 'Камера: 5 мп\r\nМаксимальное разрешение видео: 1920х1080\r\n2.7-дюймовый экран\r\nУгол обзора 140°\r\nВстроенный датчик движения\r\n4х цифровой зум\r\nG-сенсор \r\nВстроенная литиевая баттарея\r\nВозможность использования в качестве WEB-камеры\r\nПоддержка карт памяти до 32 Гб\r\nВ комплекте: кронштейн-присоска на лобовое стекло, автомобильный адаптер питания, USB-кабель, инструкция \r\nЦвет: черный', 0, 2, 0, '1074.00', '0.00', 1),
(2, '', 'браслет Power Balance', '', '', 0, 1, 3, '299.00', '0.00', 1),
(3, '', 'botomax', '', '', 0, 1, 3, '359.00', '0.00', 1),
(4, '', 'AQUAPHOB (ТЕСТ)', '', 'aquaphobcomua@gmail.com', 0, 1, 3, '0.00', '0.00', 1),
(6, '', 'DVD плеер', '34243', 'аввы ва ываыважыэважвы\r\nа эыва выа ыв\r\nаываы4ва \r\n4ыва\r\n 4ыв\r\nа 4ыв\r\nа4 ы\r\nваыв а вы', 0, 1, 0, '1580.00', '0.00', 1),
(7, '', 'Губная помада', 'Красная KA', 'Замечательная ГП, мин 1 корбка  48 шт', 0, 6, 7, '500.00', '299.00', 1),
(8, '', 'Балери клачт тест', '', '', 0, 1, 0, '0.00', '0.00', 1),
(9, '', 'Pappilock от папилом', '', '', 0, 6, 0, '349.00', '0.00', 1),
(11, '', 'Lamzac', '', '', 0, 1, 0, '1099.00', '0.00', 1),
(12, '', 'Riddex - отпугиватель грызунов и насекомых *1022*', '', '', 0, 1, 3, '145.00', '0.00', 1),
(13, '', 'Летающая фея Flying Fairy', '', '', 0, 1, 3, '239.00', '0.00', 1),
(14, '', 'Шар-предсказатель Magic Ball 8', '', '', 0, 1, 3, '99.00', '0.00', 1),
(15, '', 'Отбеливатель зубов White Light *1085*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(16, '', 'Redmond RMC-4503 + книга рецептов', '', '', 0, 1, 5, '799.00', '0.00', 1),
(17, '', 'Плойка для волос Babyliss Miracurl *1093*', '', '', 0, 1, 3, '1299.00', '0.00', 1),
(18, '', 'Rolex Daytona мужские (кварц) *1123*', '', '', 0, 1, 3, '485.00', '0.00', 1),
(19, '', 'Ягоды Годжи для похудения и оздоровления (не добавлять)', '', '', 0, 6, 0, '0.00', '0.00', 1),
(20, '', 'Антихрап 2шт (акция + браслет)', '', '', 0, 1, 3, '99.00', '0.00', 1),
(21, '', 'Bust Salon Spa - крем для увеличения и подтяжки груди *1008*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(22, '', 'Двухкамерный видеорегистратор  FULL HD DVR i1000', '', '', 0, 2, 0, '787.00', '0.00', 1),
(23, '', 'Видеорегистратор DOD F 900 LHD *1034*', '', '', 0, 2, 0, '1087.00', '0.00', 1),
(24, '', 'Моделирующий крем для тела и ягодиц', '', '', 0, 1, 3, '199.00', '0.00', 1),
(25, '', 'Aquapel антидождь, антигрязь, антиблик и др. США ( не добавлять)', '', '', 0, 2, 0, '0.00', '0.00', 1),
(26, '', 'Магнитные шторы Magic Mesh *1063*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(27, '', 'Table Mate складной столик', '', '', 0, 1, 3, '247.00', '0.00', 1),
(28, '', 'невидимый силиконовый бюсгалтер Un Bra *1159*', '', '', 0, 1, 3, '199.00', '0.00', 1),
(29, '', 'Xhose шланг 22,5 метров *1111*', '', '', 0, 1, 4, '299.00', '0.00', 1),
(30, '', 'Xhose шланг 7,5 метров *1113*', '', '', 0, 1, 4, '139.00', '0.00', 1),
(31, '', 'Xhose шланг 15 метров *1110*', '', '', 0, 1, 4, '199.00', '0.00', 1),
(32, '', 'Shakeweight виброгантеля', '', '', 0, 1, 3, '159.00', '0.00', 1),
(33, '', 'велосипед', 'AZIMUT REDHAWK 26', '', 0, 1, 3, '1875.00', '0.00', 1),
(34, '', 'Велосипед взрослый AZIMUT GAMMA 355 26', 'AZIMUT GAMMA 355 26', '', 0, 1, 3, '2475.00', '0.00', 1),
(35, '', 'Взрослый велосипед', '', '', 0, 1, 3, '0.00', '0.00', 1),
(36, '', 'Фонарь с электрошокером Шерхан 1101 Police *1116*', '', '', 0, 1, 3, '349.00', '0.00', 0),
(37, '', 'Овощерезка Nicer Dicer Plus Найсер Дайсер *1083*', '', '', 0, 1, 5, '349.00', '0.00', 1),
(38, '', 'Миксер для взбивания молока', '', '', 0, 1, 5, '49.99', '0.00', 1),
(39, '', 'Babyliss плойка (не добавлять)', '', '', 0, 1, 3, '0.00', '0.00', 1),
(40, '', 'Мультиварка ', 'Scarlett SC-411', '', 0, 1, 5, '659.00', '0.00', 1),
(41, '', 'Smoking Lock', '', '', 0, 1, 3, '399.00', '0.00', 1),
(42, '', 'Шорты', '', '', 0, 1, 0, '100.00', '100.00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fixed` tinyint(1) NOT NULL,
  `style` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `fixed`, `style`) VALUES
(3, 'Новый', 1, ''),
(11, 'Принято', 1, 'btn-primary'),
(13, 'Отказ', 1, 'btn-danger'),
(14, 'Отправлено', 1, 'btn-warning'),
(18, 'Завершено', 1, ' btn-success'),
(31, 'Возрат товара (склад)', 1, 'btn-danger'),
(32, 'Возврат товара(в пути)', 0, ''),
(33, 'test stat', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `v_email`, `phone`, `v_phone`, `sms`, `contact`, `pay_method`, `password`, `drop_key`, `active_drop`, `balance`, `total_balance`, `order_pay`, `order_pay_method`, `sale`, `total_sale`, `sale_ok`, `last_time`, `ipv4`, `country`, `region`, `city`, `agent`, `device`, `last_enter`) VALUES
(1, '1495644820', 3, 'Игорь', 'igor.sayutin@gmail.com', '', '+38(004) 565-46-54', '+38(004) 565-46-54', '', 'a:4:{i:1;s:5:"ddxfg";i:2;s:18:"+38(000) 000-00-00";i:3;s:8:"y78khbjk";i:4;s:18:"+38(000) 000-00-00";}', 'a:2:{i:1;s:19:"9867-8678-6786-7867";i:2;s:19:"yuiy78y7yiu67i867yi";}', '1c40671124502abb891ece8b9674dba3', 'cee7fee8f7c25b0726184946aeb756cf', 0, '1500.00', '2800.00', '0.00', 1, 0, 12, 12, '1497079585', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1497017990";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(2, '1495644961', 2, 'Вадим', 'slogger1990@gmail.com', '', '', '', '', '', '', 'c7e70f8844321ca123b4839bd581f644', 'a428b2b328cf4397b62b173eb6c0c10f', 0, '100.00', '200.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(4, '1495691400', 1, 'Артур', 'new-day2012@mail.ru', '', '', '', '', '', '', '4aa026d492e2645669254e7c655cc3ac', '3d20280a6888ea60528bf5b2c5d7fe90', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(5, '1495877000', 2, 'Panakshev', 'vpanakshev1@mail.ua', '', '', '', '', '', '', '778e7d704a943d8654ad8883154c2b84', '31c8ed1f2e7496a59f5cb525263eca66', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(6, '1496221566', 3, 'webmasterCRM', 'test1234@binka.me', '', '', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '7a7c71c8e9ac0b782a11f7ace1fb3353', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '1496221889', '178.213.0.225', 'UA', 'Днепропетровская область', 'Кривой Рог', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:13:"178.213.0.225";s:9:"last_time";s:10:"1496221566";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:5:"agent";s:114:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(7, '1495644820', 6, 'Просто Вася', 'dxfg2@qwe.ert', '', '', '', '', '', '', 'd58e3582afa99040e27b92b13c8f2280', '35f95c819e9b6bd6464a7fab6898b5f3', 0, '-20.00', '50.00', '0.00', 0, 3, 6, 3, '1496258763', '88.135.228.244', 'UA', 'Днепропетровская область', 'Кривой Рог', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:14:"88.135.228.244";s:9:"last_time";s:10:"1496258527";s:7:"country";s:2:"UA";s:4:"city";s:19:"Кривой Рог";s:6:"region";s:47:"Днепропетровская область";s:5:"agent";s:102:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(10, '1495724487', 5, 'szdgfzsgdg', 'dxfg21@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(11, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(12, '1495724487', 5, 'szdgfzsgdg', 'dxfg27@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(13, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(14, '1495724487', 5, 'Пользователь', 'dxfg24@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(15, '1495724487', 5, 'Управляющий', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(16, '1495724487', 5, 'szdgfzsgdg', 'dxfg285@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(17, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(18, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(19, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(20, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(21, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(22, '1495724487', 5, 'szdgfzsgdg', 'dxfg2234@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(23, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(24, '1495724487', 5, 'szdgfzsgdg', 'dxfg24534534@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(25, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(26, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(27, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(28, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(29, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(30, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(31, '1495724487', 6, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(32, '1495724487', 5, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(33, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(34, '1495724487', 6, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'sdfsdf', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(35, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(36, '1495727078', 1, 'Игорь ', 'igor.sayutin1@gmail.com', 'igor.sayutin1@gmail.com', '+38(050) 478-42-76', '+38(050) 478-42-76', '', 'igor.sayutin', 'sdfkjsdkl;fjsdf', '71b3b26aaa319e0cdf6fdb8429c112b0', '6ee399b1eb88bc4ecca7f9d527985702', 1, '130.00', '1200.00', '130.00', 1, 0, 0, 0, '1496918571', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496907492";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(37, '1495984300', 1, 'Открытый SSH-ключ', 'dxfg54@qwe.ert', '0', '+38(050) 123-45-60', '+38(050) 123-45-60', '', 'Super_Skype', 'U3234234234234', '202cb962ac59075b964b07152d234b70', 'ec23a01df3b7e172adbfe6efa092d509', 0, '-25.00', '-1230.00', '0.00', 0, 3, 8, -4, '1496994229', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496841587";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(38, '1496079345', 5, 'тест-игорь', 'dxfg58@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'e75a9c78e2dee5dd3e7b6ea57745d8a5', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(39, '1496132914', 5, 'sdrdrgdfg', 'dxfg545@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'c89f5b801e7f32a710dcfc62a2322c2b', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(40, '1496132950', 5, 'sdrdrgdfg', 'dxfg546@qwe.ert', 'dxfg546@qwe.ert', '+38(045) 654-65-45', '+38(045) 654-65-45', '', '', '', '202cb962ac59075b964b07152d234b70', '9f6ff36f6d0a94878e1315a51941f072', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '1496841571', 'localhost', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496839509";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(41, '1496133012', 5, 'sdrdrgdfg', 'dxfg547@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'a624f86779630e2d8b38aa3f529ea1a1', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '1496133012', 'localhost', 'AA', '', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(42, '1496556313', 6, 'Просто Вася', 'dxfg549@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', '9d7cb3f151e08b84cdc1c5ddf06e7087', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '1496556313', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(43, '1496585101', 6, 'тест-игорь', 'dxfg5467@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', '26c689bec410f36a618512af73834648', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '1496585101', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(44, '1496585246', 6, 'sdrdrgdfg', 'dxfg548@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', '91f4c0830d9ad20bd42c2325a94c03a3', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '1496585246', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(45, '1496585279', 6, '45y7gddfg', 'dxfg546645@qwe.ert', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 'b6ea912bb19d975c1981a0e4bec33d5f', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '1496585279', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, ''),
(51, '1495724487', 6, '45y7gddfg', 'dxfg@qwe.ert', '0', '+38(078) 987-98-97', '+38(078) 987-98-97', '', 'Skype_user', 'U2232123123123', '202cb962ac59075b964b07152d234b70', '85e4dfee1a6ad74b851a3263967eb379', 0, '7.00', '120.00', '1.00', 0, 1, 5, 3, '1497015219', 'localhost', 'AA', 'Не определен', 'Не определен', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1496994243";s:7:"country";s:2:"AA";s:4:"city";s:23:"Не определен";s:6:"region";s:23:"Не определен";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(52, '1495724706', 7, '45y7gddfg5', 'dxfg1@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', '2fb7b5f574ac3caaca8eb3f5d085ae99', 0, '-20.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(53, '1495725483', 2, 'wqeqwe', 'dxfg3@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'ed9dd85f95caf38432d5fe3a8558aa02', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(54, '1495726261', 2, 'wqeqew', 'dxfg4@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', '68b1e5a482a4522677e32719daf1ea73', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(55, '1495726298', 2, 'Проверка наличия', 'dxfg6@qwe.ert', '0', '', '0', '', '', '', '202cb962ac59075b964b07152d234b70', 'eed55d95cdefa7933764324d919e670e', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(56, '1495724487', 7, 'szdgfzsgdg', 'dxfg2@qwe.ert', '0', '', '0', '', '', '', 'ertertertert', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(57, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg7@qwe.ert', '0', '', '0', '', '', '', 'd9b25478896b77ae97ba017bc979bd26', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(58, '1495724487', 5, 'szdgfzsgdg', 'dxfg9@qwe.ert', '0', '', '0', '', '', '', 'd58e3582afa99040e27b92b13c8f2280', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, ''),
(59, '1495724487', 5, 'dfgdfgsdgsdfg', 'dxfg10@qwe.ert', '0', '', '0', '', '', '', 'ghfghfgh', '', 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, '', '', '', '', '', '', 0, '');

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
