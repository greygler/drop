<?
define('SITE_ADDR','http://drop'); // Адрес системы без слеш на конце!
//define('SITE_ADDR','https://drop.greygler.pro'); // Адрес системы
define('ABS_PATH',$_SERVER['DOCUMENT_ROOT']); //  Абсолютный путь на сервере
define('TIME_ZONE','Europe/Kiev'); // Временная зона, http://php.net/manual/ru/timezones.europe.php
define('LANG','ru'); // Язык страницы
define('TITLE','Дропшипинг'); // Метатег title
define('DESCRIPTION','Дропшипинг'); // Метатег description
define('KEYWORDS','Дропшипинг'); // Метатег keywords
define('ROBOTS','none'); // Метатег robots

/* Метатег robots управляет индексированием страниц. 
Можно запретить роботам не только индексацию самого документа, 
но и прохождение по имеющимся в нем ссылкам. Возможные значения:

    index / noindex — индексировать / не индексировать эту страницу;
    follow / nofollow — идти / не идти по ссылкам с этой страницы;
    all = "index, follow"
    none = "noindex, nofollow" */

define('FAVICON_PATH',ABS_PATH.'/favicon'); // Путь для favicon на сервере
define('FAVICON_G_PATH',SITE_ADDR.'/favicon'); // Абсолютный путь для favicon
define('FAVICON','favicon.png'); // Файл PNG размером не менее 152x152 для создания favicon. 
define('JS_PATH',SITE_ADDR.'/js'); // Абсолютный путь для JS
define('CSS_PATH',SITE_ADDR.'/css'); // Абсолютный путь для css
define('ACTION_PATH',SITE_ADDR.'/action'); // Абсолютный путь для action
define('PAGE_PATH',ABS_PATH.'/pages/'); // Серверный путь для pages
define('CLASS_PATH',ABS_PATH.'/class'); // Серверный  путь для class
define('IMG_NEWS_ABS_PATH',ABS_PATH.'/img_news/'); // Серверный  путь для новостийных картинок
define('IMG_NEWS_PATH',SITE_ADDR.'/img_news/'); // Абсолютный путь для новостийных картинок
define('IMG_NEWS_NAME','noimg.jpg'); // Новостийная картинка по умолчанию
define('IMG_PRODUCT_PATH',SITE_ADDR.'/img_product/'); // Абсолютный путь для картинок с продуктом
define('IMG_PROD_PATH',ABS_PATH.'/img_product/'); // Серверный путь для картинок с продуктом
define('IMG_PRODUCT_NAME','noimg.png'); // Картинка продукта по умолчанию
define('IMG_PATH',SITE_ADDR.'/img/'); // Абсолютный путь для картинок

define('SKYPE','Skype'); // Skype техподдержки
define('PHONE','+38(000) 000-00-00'); // Телефон техподдержки
define('CURRENCY','грн'); // Валюта системы
define('COUNTRY','UA'); // Страна по умолчанию
define('ADDRESS','OOO "ДропСервис", г. Мухосральск'); // Адрес предприятия
define('MIN_PAY','100'); // Минимальная сумма выплат
define('POST_PAY','70'); // Cумма транспортных затрат в обе стороны по умолчанию
define('MIN_SUMM','100'); // Минимальная сумма баланса, при котором автоматически "Пользователь по предоплате" переводится в "Пользователь"
define('START_USER','5'); // Категория нового пользователя


// 5 - Пользователь по предоплате
// 6 - Пользователь
// 7 - Привелегированный пользователь

$view_pages=array(10, 25, 50, 100); // Колличество отображаемых строк при пагинации
$view_news=array(5,10, 25, 50, 100); // Колличество отображаемых новостей при пагинации

define('UPDATE_PRODUCT',true); // Разрешение обновления продуктов заказа, если они изменились в СРМ
define('UPDATE_TIME','3600'); // Период обновления данных из LP-CRM
define('LAST_TIME_FILE','last_time.php'); // Файл с данными об обновлении
define('ACTIVE_PRODUCT','1'); // Новый продукт изначально 1 - активный, 0 - не активный
define('DEFAULT_ID','1'); // Id, на кого заказ, если KEY не обнаружен

define('MASK_PHONE_UA','\+38(0*9) 999-99-99'); // Маска номера телефона Украина
define('MASK_PHONE_RU','\+7(*99) 999-99-99'); // Маска номера телефона Россия
define('MASK_PHONE_RU8','\8(999) 999-99-99'); // Маска номера телефона Россия с 8
define('MASK_PHONE_BY','\+37(599) 999-99-99'); // Маска номера телефона РБ

define('MASK_PHONE', MASK_PHONE_UA); // Активная маска номера телефона

// Подключение к LP-CRM
define('CRM','testcrm');
define('CRM_KEY','9ef4d26ea5e96179a98c8d8502cb4c34');
define('CRM_OFFICE','3');
define('CRM_DELIVERY','1');
define('CRM_DELIVERY_NAME','Новая Почта');

// SMTP
$__smtp = array(
    "host" => 'mail.adm.tools', // SMTP сервер
    "debug" => 0, // Уровень логирования полный -2
    "auth" => true, // Авторизация на сервере SMTP. Если ее нет - false
    "port" => '465', // Порт SMTP сервера
    "username" => 'drop@greygler.pro', // Логин запрашиваемый при авторизации на SMTP сервере
    "password" => 'eSZ74LNhah65', // Пароль
    "addreply" => 'drop@greygler.pro', // Почта для ответа
    "secure" => 'ssl', // Тип шифрования. Например ssl или tls
    "mail_name" => 'Дропшиппинг' // Имя отправителя
);


// Подключение к turbosms
define('DB_LOGIN_TURBOSMS','ArturGoraCRM');
define('DB_PASS_TURBOSMS','590579crm');
define('NAME_TURBOSMS','Msg');

define('UTM_SOURCE','');
define('UTM_MEDIUM','');
define('UTM_TERM','');
define('UTM_CONTENT','');
define('UTM_CAMPAIGN','');
?>
<?
define('DB_HOST', 'localhost'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'drop'); 	// Название базы данных
define('DB_LOGIN', 'drop'); 	// Логин базы данных
define('DB_PASS', 'drop'); 	// Пароль базы данных 
?>
<?
/* define('DB_HOST', 'localhost'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'u12568_info'); 	// Название базы данных
define('DB_LOGIN', 'u12568_info'); 	// Логин базы данных
define('DB_PASS', 'DsRr^79bw?lJ'); 	// Пароль базы данных 
?>
<?
define('DB_HOST', 'greygler.mysql.ukraine.com.ua'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'greygler_drop'); 	// Название базы данных
define('DB_LOGIN', 'greygler_drop'); 	// Логин базы данных
define('DB_PASS', 'zmnapzaw'); 	// Пароль базы данных */
?>