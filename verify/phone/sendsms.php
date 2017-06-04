<?
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'].'/class/turbosms_db.class.php'); 
//$out=sms
$_SESSION['send_sms']='ok';
?>
SMS на номер<br><strong><? //print_r($_SESSION); ?>-<?= $_SESSION["phone"] ?></strong><br>отправлена!