-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 24 2017 г., 21:46
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
-- Структура таблицы `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subj` varchar(256) NOT NULL,
  `mail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `email`
--

INSERT INTO `email` (`id`, `subj`, `mail`) VALUES
(1, 'Верификация E-mail', 'Вы отправили запрос  с сайта %site% на верификацию E-mail:%email%.\\n\nДля продолжения верификации пройдите по ссылке %verify_link%.\n\nС Уважением, администрация %title%\n'),
(2, 'Проблемы на дропшиппинге', 'Внимание! \r\nУ Вас отрицательный баланс!\r\n\r\nС Уважением, админисрация');

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
  `provider` varchar(100) NOT NULL,
  `agent` varchar(256) NOT NULL,
  `device` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `enter_log`
--

INSERT INTO `enter_log` (`id`, `user_id`, `last_time`, `ipv4`, `country`, `region`, `city`, `provider`, `agent`, `device`) VALUES
(1, 1, '1497958737', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(2, 1, '1497958737', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(3, 1, '1497958837', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(4, 1, '1497958841', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(5, 1, '1497958845', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(6, 1, '1497958921', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(7, 1, '1497958987', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(8, 1, '1497959011', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(9, 6, '1498037910', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(10, 1, '1498040865', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(11, 7, '1498043800', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(12, 7, '1498043847', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(13, 1, '1498043876', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(14, 1, '1498044793', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0),
(15, 1, '1498044797', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0),
(16, 6, '1498045108', 'localhost', '', '', '', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1', 3),
(17, 6, '1498046335', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(18, 1, '1498046944', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(19, 1, '1498046946', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(20, 6, '1498047101', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(21, 1, '1498047154', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(22, 7, '1498047207', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0),
(23, 1, '1498282606', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0),
(24, 1, '1498283784', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:54.0) Gecko/20100101 Firefox/54.0', 0),
(25, 6, '1498319078', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:54.0) Gecko/20100101 Firefox/54.0', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `money`
--

CREATE TABLE IF NOT EXISTS `money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `datetime` varchar(11) NOT NULL,
  `name` tinyint(1) NOT NULL,
  `summ` decimal(10,2) NOT NULL,
  `order_id` varchar(12) NOT NULL,
  `comment` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `money`
--

INSERT INTO `money` (`id`, `user_id`, `datetime`, `name`, `summ`, `order_id`, `comment`) VALUES
(13, 6, '1498046696', 1, '608.00', '14980464089', 'Продажа'),
(14, 6, '1498046841', 0, '70.00', '14980467851', 'Почтовые расходы');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `pic`, `text`) VALUES
(1, '1495298700', '', 'Начались работы  по созданию версии 1.0 системы управления продаж по дропшипингу'),
(2, '1497951900', '', 'Запущена β-версия продукта для тестирования');

-- --------------------------------------------------------

--
-- Структура таблицы `order_tab`
--

CREATE TABLE IF NOT EXISTS `order_tab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(12) NOT NULL,
  `lp-crm` tinyint(1) NOT NULL,
  `order_time` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cancel_description` varchar(256) NOT NULL,
  `country` varchar(2) NOT NULL,
  `bayer_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `products` text NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `profit` decimal(6,2) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `site` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `delivery_adress` varchar(256) NOT NULL,
  `delivery_index` varchar(10) NOT NULL,
  `delivery` varchar(30) NOT NULL,
  `ttn` varchar(25) NOT NULL,
  `ttn_status` varchar(25) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `utm_source` varchar(50) NOT NULL,
  `utm_medium` varchar(50) NOT NULL,
  `utm_term` varchar(50) NOT NULL,
  `utm_content` varchar(50) NOT NULL,
  `utm_campaign` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `order_tab`
--

INSERT INTO `order_tab` (`id`, `user_id`, `order_id`, `lp-crm`, `order_time`, `status`, `cancel_description`, `country`, `bayer_name`, `phone`, `email`, `products`, `total`, `profit`, `comment`, `site`, `ip`, `delivery_adress`, `delivery_index`, `delivery`, `ttn`, `ttn_status`, `delivery_date`, `utm_source`, `utm_medium`, `utm_term`, `utm_content`, `utm_campaign`) VALUES
(18, 6, '14983212339', 1, '1498321258', 3, '', '', 'Опять Вася1', '+38(067) 342-35-67', '', 'a%3A1%3A%7Bi%3A1%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A2%3A%2214%22%3Bs%3A5%3A%22price%22%3Bs%3A3%3A%22106%22%3Bs%3A5%3A%22count%22%3Bs%3A1%3A%221%22%3B%7D%7D', '106.00', '7.00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 6, '14983214060', 1, '1498321439', 3, '', '', 'Опять Вася2', '+38(009) 876-55-45', '', 'a%3A1%3A%7Bi%3A1%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A2%3A%2215%22%3Bs%3A5%3A%22price%22%3Bs%3A3%3A%22203%22%3Bs%3A5%3A%22count%22%3Bs%3A1%3A%222%22%3B%7D%7D', '406.00', '8.00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 6, '14983215488', 1, '1498321575', 3, '', '', 'Опять Вася3', '+38(067) 845-65-43', '', 'a%3A1%3A%7Bi%3A1%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A1%3A%228%22%3Bs%3A5%3A%22price%22%3Bs%3A4%3A%220.00%22%3Bs%3A5%3A%22count%22%3Bs%3A1%3A%221%22%3B%7D%7D', '0.00', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 6, '14983226326', 1, '1498322656', 13, '', '', 'Снова Вася145', '380566666689', '', 'a%3A1%3A%7Bi%3A0%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A2%3A%2213%22%3Bs%3A5%3A%22price%22%3Bs%3A6%3A%22239.00%22%3Bs%3A8%3A%22quantity%22%3Bs%3A1%3A%221%22%3B%7D%7D', '239.00', '0.00', '', '', '', '', '', 'Новая Почта', '', '', '0000-00-00 00:00:00', '', '', '', '', ''),
(22, 6, '14983263611', 1, '1498326400', 13, '', '', 'Хренофон', '380456456456', '', 'a%3A1%3A%7Bi%3A0%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A2%3A%2217%22%3Bs%3A5%3A%22price%22%3Bs%3A7%3A%221300.00%22%3Bs%3A8%3A%22quantity%22%3Bs%3A1%3A%222%22%3B%7D%7D', '2600.00', '2.00', '', '', '', '', '', 'Новая Почта', '', '', '0000-00-00 00:00:00', '', '', '', '', ''),
(23, 6, '14983264394', 1, '1498326473', 13, '', '', 'Хренофон2', '380453453453', '', 'a%3A1%3A%7Bi%3A0%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A2%3A%2219%22%3Bs%3A5%3A%22price%22%3Bs%3A5%3A%2213.00%22%3Bs%3A8%3A%22quantity%22%3Bs%3A1%3A%221%22%3B%7D%7D', '13.00', '13.00', '', '', '', '', '', 'Новая Почта', '', '', '0000-00-00 00:00:00', '', '', '', '', ''),
(24, 6, '14983267445', 1, '1498326768', 13, '', '', 'Хренофон23', '380890890890', '', 'a%3A1%3A%7Bi%3A0%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A1%3A%229%22%3Bs%3A5%3A%22price%22%3Bs%3A6%3A%22358.00%22%3Bs%3A8%3A%22quantity%22%3Bs%3A1%3A%222%22%3B%7D%7D', '716.00', '18.00', '', '', '', '', '', 'Новая Почта', '', '', '0000-00-00 00:00:00', '', '', '', '', ''),
(25, 6, '14983273866', 1, '1498327421', 13, 'Клиент отказался или передумал', '', 'Хренофон78', '380787887877', '', 'a%3A1%3A%7Bi%3A0%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A2%3A%2220%22%3Bs%3A5%3A%22price%22%3Bs%3A5%3A%2299.00%22%3Bs%3A8%3A%22quantity%22%3Bs%3A1%3A%221%22%3B%7D%7D', '99.00', '0.00', '', '', '', '', '', 'Новая Почта', '', '', '0000-00-00 00:00:00', '', '', '', '', ''),
(26, 6, '14983297604', 1, '1498329781', 3, '', 'UA', 'Вассисуалий2137', '+38(067) 867-86-78', '', 'a%3A1%3A%7Bi%3A1%3Ba%3A3%3A%7Bs%3A10%3A%22product_id%22%3Bs%3A1%3A%229%22%3Bs%3A5%3A%22price%22%3Bs%3A6%3A%22349.00%22%3Bs%3A5%3A%22count%22%3Bs%3A1%3A%221%22%3B%7D%7D', '349.00', '0.00', '', 'drop', '127.0.0.1', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_history`
--

CREATE TABLE IF NOT EXISTS `pay_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_order` varchar(11) NOT NULL,
  `date_pay` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `summ` decimal(6,2) NOT NULL,
  `method_pay` tinyint(4) NOT NULL,
  `pay_status` tinyint(4) NOT NULL,
  `comment` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `pay_history`
--

INSERT INTO `pay_history` (`id`, `date_order`, `date_pay`, `user_id`, `summ`, `method_pay`, `pay_status`, `comment`) VALUES
(12, '1498046919', '1498047062', 6, '538.00', 1, 2, 'Не указаны данные для выплаты');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

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
-- Структура таблицы `pay_status`
--

CREATE TABLE IF NOT EXISTS `pay_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pay_status`
--

INSERT INTO `pay_status` (`id`, `name`) VALUES
(0, 'Принято'),
(1, 'Выплачено'),
(2, 'Отклонено');

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
  `post_pay` decimal(6,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `pic`, `name`, `model`, `description`, `manufacturer`, `cat`, `subcat`, `price`, `spec_price`, `post_pay`, `active`) VALUES
(1, '', 'Видерегистратор FULL HD  K6000', 'K6000', 'Камера: 5 мп\r\nМаксимальное разрешение видео: 1920х1080\r\n2.7-дюймовый экран\r\nУгол обзора 140°\r\nВстроенный датчик движения\r\n4х цифровой зум\r\nG-сенсор \r\nВстроенная литиевая баттарея\r\nВозможность использования в качестве WEB-камеры\r\nПоддержка карт памяти до 32 Гб\r\nВ комплекте: кронштейн-присоска на лобовое стекло, автомобильный адаптер питания, USB-кабель, инструкция \r\nЦвет: черный', 0, 2, 0, '1074.00', '0.00', '0.00', 1),
(2, '', 'браслет Power Balance', '', '', 0, 1, 3, '299.00', '0.00', '0.00', 1),
(3, '', 'botomax', '', '', 0, 1, 3, '359.00', '0.00', '0.00', 1),
(4, '', 'AQUAPHOB (ТЕСТ)', '', 'aquaphobcomua@gmail.com', 0, 1, 3, '0.00', '0.00', '0.00', 1),
(6, '', 'DVD плеер', '34243', 'аввы ва ываыважыэважвы\r\nа эыва выа ыв\r\nаываы4ва \r\n4ыва\r\n 4ыв\r\nа 4ыв\r\nа4 ы\r\nваыв а вы', 0, 1, 0, '1580.00', '0.00', '0.00', 1),
(7, '', 'Губная помада', 'Красная KA', 'Замечательная ГП, мин 1 корбка  48 шт', 0, 6, 7, '500.00', '299.00', '0.00', 1),
(8, '', 'Балери клачт тест', '', '', 0, 1, 0, '0.00', '0.00', '0.00', 1),
(9, '', 'Pappilock от папилом', '', '', 0, 6, 0, '349.00', '0.00', '0.00', 1),
(11, '', 'Lamzac', '', '', 0, 1, 0, '1099.00', '0.00', '0.00', 1),
(12, '', 'Riddex - отпугиватель грызунов и насекомых *1022*', '', '', 0, 1, 3, '145.00', '0.00', '0.00', 1),
(13, '', 'Летающая фея Flying Fairy', '', '', 0, 1, 3, '239.00', '0.00', '0.00', 1),
(14, '', 'Шар-предсказатель Magic Ball 8', '', '', 0, 1, 3, '99.00', '0.00', '0.00', 1),
(15, '', 'Отбеливатель зубов White Light *1085*', '', '', 0, 1, 3, '199.00', '0.00', '0.00', 1),
(16, '', 'Redmond RMC-4503 + книга рецептов', '', '', 0, 1, 5, '799.00', '0.00', '0.00', 1),
(17, '', 'Плойка для волос Babyliss Miracurl *1093*', '', '', 0, 1, 3, '1299.00', '0.00', '0.00', 1),
(18, '', 'Rolex Daytona мужские (кварц) *1123*', '', '', 0, 1, 3, '485.00', '0.00', '0.00', 1),
(19, '', 'Ягоды Годжи для похудения и оздоровления (не добавлять)', '', '', 0, 6, 0, '0.00', '0.00', '0.00', 1),
(20, '', 'Антихрап 2шт (акция + браслет)', '', '', 0, 1, 3, '99.00', '0.00', '0.00', 1),
(21, '', 'Bust Salon Spa - крем для увеличения и подтяжки груди *1008*', '', '', 0, 1, 3, '199.00', '0.00', '0.00', 1),
(22, '', 'Двухкамерный видеорегистратор  FULL HD DVR i1000', '', '', 0, 2, 0, '787.00', '0.00', '0.00', 1),
(23, '', 'Видеорегистратор DOD F 900 LHD *1034*', '', '', 0, 2, 0, '1087.00', '0.00', '0.00', 1),
(24, '', 'Моделирующий крем для тела и ягодиц', '', '', 0, 1, 3, '199.00', '0.00', '0.00', 1),
(25, '', 'Aquapel антидождь, антигрязь, антиблик и др. США ( не добавлять)', '', '', 0, 2, 0, '0.00', '0.00', '0.00', 1),
(26, '', 'Магнитные шторы Magic Mesh *1063*', '', '', 0, 1, 3, '199.00', '0.00', '0.00', 1),
(27, '', 'Table Mate складной столик', '', '', 0, 1, 3, '247.00', '0.00', '0.00', 1),
(28, '', 'невидимый силиконовый бюсгалтер Un Bra *1159*', '', '', 0, 1, 3, '199.00', '0.00', '0.00', 1),
(29, '', 'Xhose шланг 22,5 метров *1111*', '', '', 0, 1, 4, '299.00', '0.00', '0.00', 1),
(30, '', 'Xhose шланг 7,5 метров *1113*', '', '', 0, 1, 4, '139.00', '0.00', '0.00', 1),
(31, '', 'Xhose шланг 15 метров *1110*', '', '', 0, 1, 4, '199.00', '0.00', '0.00', 1),
(32, '', 'Shakeweight виброгантеля', '', '', 0, 1, 3, '159.00', '0.00', '0.00', 1),
(33, '', 'велосипед', 'AZIMUT REDHAWK 26', '', 0, 1, 3, '1875.00', '0.00', '0.00', 1),
(34, '', 'Велосипед взрослый AZIMUT GAMMA 355 26', 'AZIMUT GAMMA 355 26', '', 0, 1, 3, '2475.00', '0.00', '0.00', 1),
(35, '', 'Взрослый велосипед', '', '', 0, 1, 3, '0.00', '0.00', '0.00', 1),
(36, '', 'Фонарь с электрошокером Шерхан 1101 Police *1116*', '', '', 0, 1, 3, '349.00', '0.00', '0.00', 0),
(37, '', 'Овощерезка Nicer Dicer Plus Найсер Дайсер *1083*', '', '', 0, 1, 5, '349.00', '0.00', '0.00', 1),
(38, '', 'Миксер для взбивания молока', '', '', 0, 1, 5, '49.99', '0.00', '0.00', 1),
(39, '', 'Babyliss плойка (не добавлять)', '', '', 0, 1, 3, '0.00', '0.00', '0.00', 1),
(40, '', 'Мультиварка ', 'Scarlett SC-411', '', 0, 1, 5, '659.00', '0.00', '0.00', 1),
(41, '', 'Smoking Lock', '', '', 0, 1, 3, '399.00', '0.00', '0.00', 1),
(42, '', 'Шорты', '', '', 0, 1, 0, '100.00', '100.00', '0.00', 0);

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
  `take_drop` tinyint(1) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `total_balance` decimal(10,2) NOT NULL,
  `order_pay` decimal(10,2) NOT NULL,
  `order_pay_method` tinyint(4) NOT NULL,
  `order_pay_id` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `total_sale` int(11) NOT NULL,
  `sale_ok` int(11) NOT NULL,
  `last_time` varchar(11) NOT NULL,
  `ipv4` varchar(20) NOT NULL,
  `country` varchar(2) NOT NULL,
  `region` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `agent` varchar(256) NOT NULL,
  `device` tinyint(1) NOT NULL,
  `last_enter` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `registration`, `users_group`, `name`, `email`, `v_email`, `phone`, `v_phone`, `sms`, `contact`, `pay_method`, `password`, `drop_key`, `active_drop`, `take_drop`, `balance`, `total_balance`, `order_pay`, `order_pay_method`, `order_pay_id`, `sale`, `total_sale`, `sale_ok`, `last_time`, `ipv4`, `country`, `region`, `city`, `provider`, `agent`, `device`, `last_enter`) VALUES
(0, '0', 3, 'GreyGler', 'GreyGler@proger.com', 'GreyGler@proger.com', 'GreyGler', 'GreyGler', '', '', '', '1c40671124502abb891ece8b9674dba3', '', 0, 0, '1200.00', '1200.00', '0.00', 0, 0, 0, 0, 0, '1497338654', 'localhost', 'AA', 'Не определен', 'Не определен', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:7:{s:4:"ipv4";s:0:"";s:9:"last_time";s:0:"";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:5:"agent";s:0:"";s:6:"device";s:1:"0";}'),
(1, '1495644820', 3, 'Игорь', 'igor.sayutin@gmail.com', '', '+38(004) 565-46-54', '+38(004) 565-46-54', '', 'a:4:{i:1;s:5:"ddxfg";i:2;s:18:"+38(000) 000-00-00";i:3;s:8:"y78khbjk";i:4;s:18:"+38(000) 000-00-00";}', 'a:2:{i:1;s:19:"9867-8678-6786-7867";i:2;s:13:"U777777777777";}', '1c40671124502abb891ece8b9674dba3', '6c350031e6703349f7533c084ebcdcbb', 0, 0, '300.00', '3100.00', '0.00', 0, 10, 0, 12, 12, '1498283784', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:54.0) Gecko/20100101 Firefox/54.0', 0, 'a:8:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1498282606";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:8:"provider";s:0:"";s:5:"agent";s:102:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(2, '1495644961', 2, 'Вадим', 'slogger1990@gmail.com', '', '', '', '', '', '', 'c7e70f8844321ca123b4839bd581f644', 'a428b2b328cf4397b62b173eb6c0c10f', 0, 0, '100.00', '200.00', '0.00', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, ''),
(3, '1495691400', 1, 'Артур', 'new-day2012@mail.ru', '', '', '', '', '', '', '4aa026d492e2645669254e7c655cc3ac', '3d20280a6888ea60528bf5b2c5d7fe90', 0, 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, ''),
(4, '1495877000', 2, 'Panakshev', 'vpanakshev1@mail.ua', '', '', '', '', '', '', '778e7d704a943d8654ad8883154c2b84', '31c8ed1f2e7496a59f5cb525263eca66', 0, 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, ''),
(5, '1496221566', 3, 'webmasterCRM', 'test1234@binka.me', '', '', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '7a7c71c8e9ac0b782a11f7ace1fb3353', 0, 0, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, '1496221889', '178.213.0.225', 'UA', 'Днепропетровская область', 'Кривой Рог', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 0, 'a:7:{s:4:"ipv4";s:13:"178.213.0.225";s:9:"last_time";s:10:"1496221566";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:5:"agent";s:114:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:6:"device";s:1:"0";}'),
(6, '1498037910', 5, 'Тестер', 'tester@tester.com', '', '', '', '', '', '', 'f5d1278e8109edd94e1e4197e04873b9', '0db77295bc37a3295eb83956952c2cb6', 1, 0, '538.00', '608.00', '0.00', 0, 12, 0, 0, 0, '1498319078', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:54.0) Gecko/20100101 Firefox/54.0', 0, 'a:8:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1498047101";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:8:"provider";s:0:"";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}'),
(7, '1498043800', 5, 'Tester-1', 'tester-1@tester.com', '', '', '', '', '', '', 'f5d1278e8109edd94e1e4197e04873b9', '59aba23486e8d4c3e2f2fc1c8ca7041b', 0, 0, '-70.00', '0.00', '0.00', 0, 0, 0, 0, 0, '1498047207', 'localhost', '', '', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 0, 'a:8:{s:4:"ipv4";s:9:"localhost";s:9:"last_time";s:10:"1498043847";s:7:"country";s:0:"";s:4:"city";s:0:"";s:6:"region";s:0:"";s:8:"provider";s:0:"";s:5:"agent";s:65:"Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0";s:6:"device";s:1:"0";}');

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
(1, 'Администратор', 'fa-trophy', 'fa-diamond', 4),
(2, 'Управляющий', 'fa-line-chart', 'fa-star', 4),
(3, 'Программист', 'fa-linux', 'fa-code', 4),
(5, 'Пользователь (предоплата)', 'fa-user-circle', 'fa-credit-card', 2),
(6, 'Пользователь ', 'fa-user-circle', 'fa-user', 4),
(7, 'Пользователь (ок)', 'fa-user-circle', 'fa-id-badge', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
