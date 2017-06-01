<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/turbosms_db.class.php'); 
//$out=sms

?>
SMS на номер<br><strong><?= $_SESSION["phone"] ?></strong><br>отправлена!