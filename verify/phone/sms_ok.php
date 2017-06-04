<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php'); 

//echo "-".$_SESSION['sms']."-".$_POST['code_sms']."-";
if ($_SESSION['sms']==$_POST['code_sms']) {autoring::del_sms_code($_SESSION['id']); autoring::verify_sms($_SESSION['id'], $_POST['v_phone']); echo ("ok");}
else echo("error");
 
?>
