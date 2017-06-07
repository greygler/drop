<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ 
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php'); 
require_once (CLASS_PATH.'/turbosms_db.class.php'); 
$sms=autoring::sms_code($_SESSION['id']);
autoring::verify_sms($_SESSION['id'], '');
?>
SMS <?= $sms ?> на номер<br><strong><?= $_SESSION["phone"] ?></strong><br>отправлена!
<? } ?>