<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ 
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php'); 

//echo "-".$_SESSION['sms']."-".$_POST['code_sms']."-";
if ($_SESSION['sms']==$_POST['code_sms']) {
	autoring::del_sms_code($_POST['id']); 
	$get_user=autoring::get_user($_POST['id']);
	$ver_sms=autoring::verify_sms($_POST['id'], $get_user['phone']);
	echo $ver_sms;
	}
else echo("error #2");
}
?>
