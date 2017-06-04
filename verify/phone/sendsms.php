<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/turbosms_db.class.php'); 
$sms=autoring::sms_code($_SESSION['id']);
?>
SMS <?= $sms ?> на номер<br><strong><?= $_SESSION["phone"] ?></strong><br>отправлена!