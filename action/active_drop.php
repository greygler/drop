<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
$result=autoring::active_drop($_POST['id'], $_POST['drop_active']);
if ($result)
{
	if ($_POST['drop_active']!='1') echo('<font color="#737373">Отключена</font>'); else echo('<font color="blue">Включенa</font>') ;
}	else echo('<font color="red">Ошибка!</font>');
} else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php");
?>
