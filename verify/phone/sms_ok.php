<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ 
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php'); 

//echo "-".$_SESSION['sms']."-".$_POST['code_sms']."-";
if ($_SESSION['sms']==$_POST['code_sms']) {
	autoring::del_sms_code($_SESSION['id']); 
	if (autoring::verify_sms($_SESSION['id'], $_POST['v_phone'])) echo ("ok"); else echo("error #1");
	}
else echo("error #2");
}
?>
