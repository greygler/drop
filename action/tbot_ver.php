<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/tbot.class.php');

$t_ver=autoring::t_v_bot($_SESSION['id'], $_POST['bot_ver_code']);
if ($t_ver=="ok"){
	//echo($_SESSION['telegram']."=".$_SESSION['t_verife']);
$vermessage="Бот успешно верифицирован.";
tbot::send_bot($_SESSION['telegram'], $vermessage);
echo $vermessage;}
else echo "Ошибка верификации";





} else header("Location: ".SITE_ADDR."/error/666.php");
?>