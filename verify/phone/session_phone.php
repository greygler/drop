<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ 
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
autoring::update_phone($_SESSION['id'], $_POST['phone']);
$_SESSION['phone']=$_POST['phone'];
if(autoring::is_verify_phone()) echo ('error'); else echo('ok');
}
?>