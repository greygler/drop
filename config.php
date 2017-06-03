<?
define('SITE_ADDR','http://drop'); // Адрес системы
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

define('FAVICON_PATH','favicon'); // Путь для favicon
define('FAVICON','favicon.png'); // Файл PNG размером не менее 152x152 для создания favicon. 

define('SKYPE','Skype'); // Skype техподдержки
define('PHONE','+38(000) 000-00-00'); // Телефон техподдержки
define('CURRENCY','грн'); // Валюта системы
define('ADDRESS','OOO "ДропСервис", г. Мухосральск'); // Адрес предприятия
define('MIN_PAY','100'); // Минимальная сумма выплат
define('START_USER','6'); // Категория нового пользователя
// 5 - Пользователь
// 6 - Пользователь по предоплате
// 7 - Привелегированный пользователь

$view_pages=array(10, 25, 50, 100); // Колличество отображаемых строк при пагинации

define('UPDATE_TIME','3600'); // Период обновления данных из LP-CRM
define('LAST_TIME_FILE','last_time.php'); // Период обновления данных из LP-CRM

define('MASK_PHONE_UA','\+38(0*9) 999-99-99'); // Маска номера телефона Украина
define('MASK_PHONE_RU','\+7(*99) 999-99-99'); // Маска номера телефона Россия
define('MASK_PHONE_RU8','\ 8 (999) 999-99-99'); // Маска номера телефона Россия с 8
define('MASK_PHONE_BY','\+37(599) 999-99-99'); // Маска номера телефона РБ

define('MASK_PHONE', MASK_PHONE_UA); // Активная маска номера телефона

// Подключение к LP-CRM
define('CRM','testcrm');
define('CRM_KEY','9ef4d26ea5e96179a98c8d8502cb4c34');
define('CRM_OFFICE','3');
define('CRM_DELIVERY','1');
define('CRM_PAYMENT','4');

// Подключение к turbosms
define('DB_LOGIN_TURBOSMS','ArturGoraCRM');
define('DB_PASS_TURBOSMS','590579crm');
define('NAME_TURBOSMS','Msg');

define('UTM_SOURCE','');
define('UTM_MEDIUM','');
define('UTM_TERM','');
define('UTM_CONTENT','');
define('UTM_CAMPAIGN','');

define('DB_HOST', 'localhost'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'drop'); 	// Название базы данных
define('DB_LOGIN', 'drop'); 	// Логин базы данных
define('DB_PASS', 'drop'); 	// Пароль базы данных
?>