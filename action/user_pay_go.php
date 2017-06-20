<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
//print_r($_POST);
echo autoring::order_pay_go($_POST['id'], $_POST['order_summ'], $_POST['pay_status'], $_POST['comment']);
} else header("Location: ".SITE_ADDR."/error/666.php");
?>