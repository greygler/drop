<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/tbot.class.php');

$t_ver=autoring::tbot($_SESSION['id'], $_POST['bot_id']);
$vercode="Выполнено подключение к боту.%0AВаш проверочный код: {$t_ver}%0AВведите его в соответсвующее поле.";
tbot::send_bot($_POST['bot_id'], $vercode);





} else header("Location: ".SITE_ADDR."/error/666.php");
?>