<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
require_once (CLASS_PATH.'/autoring.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
$base=autoring::get_user($_GET['user_id']);
if ($base['email']!=$base['vemail']) {
if ($_GET['verify_code']==md5($base['email'])) 	autoring::verify_email($_GET['user_id'], $base['email']);
$verify="1"; else $verify="3";
}
else $verify="2";
header("Location: https://drop.greygler.pro/?type=user&verify={$verify}");
?>