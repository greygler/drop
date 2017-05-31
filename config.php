<?
define('SITE_ADDR','http://drop'); // Адрес системы
define('TIME_ZONE','Europe/Kiev'); // Временная зона, http://php.net/manual/ru/timezones.europe.php
define('LANG','ru'); // Язык страницы
define('TITLE','Дропшипинг'); // Название, метатег title
define('DESCRIPTION','Дропшипинг'); // Название, метатег description
define('KEYWORDS','Дропшипинг'); // Название, метатег keywords
define('ROBOTS','none'); // Название, метатег robots

/* Метатег robots управляет индексированием страниц. 
Можно запретить роботам не только индексацию самого документа, 
но и прохождение по имеющимся в нем ссылкам. Возможные значения:

    index / noindex — индексировать / не индексировать эту страницу;
    follow / nofollow — идти / не идти по ссылкам с этой страницы;
    all = "index, follow"
    none = "noindex, nofollow" */

define('FAVICON_PATH','favicon'); // Путь для favicon
define('FAVICON','favicon.png'); // Файл PNG размером не менее 152x152 для создания favicon. 

define('SKYPE','Skype');
define('PHONE','+38(000) 000-00-00');
define('CURRENCY','грн');
define('ADDRESS','OOO "ДропСервис", г. Мухосральск');
define('MIN_PAY','100');

$view_pages=array(10, 25, 50, 100);


define('MASK_PHONE','\+38(0*9) 999-99-99');



define('CRM','testcrm');
define('CRM_KEY','9ef4d26ea5e96179a98c8d8502cb4c34');
define('CRM_OFFICE','3');
define('CRM_DELIVERY','1');
define('CRM_PAYMENT','4');

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