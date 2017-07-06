<?
//require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ('/home/greygler/greygler.pro/drop/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/drop.class.php');
require_once (CLASS_PATH.'/lpcrm.class.php');

drop::update_data(); // Обновляем категории, статусы и товар


?>