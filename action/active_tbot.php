<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
$result=autoring::active_tbot($_POST['id'], $_POST['tbox']);
if ($result)
{
	if ($_POST['tbox']!='1') echo('<font color="#737373">Отключено</font>'); else echo('<font color="blue">Включено</font>') ;
}	else echo('<font color="red">Ошибка!</font>');
} else header("Location: ".SITE_ADDR."/error/666.php");
?>
