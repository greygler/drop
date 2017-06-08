<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/drop.class.php');

	$out=drop::order_pay($_POST['id'], $_POST['order_summ'],$_POST['pay_method']);
	if ($out=="ok") $_SESSION['order_pay']=$_POST['order_summ'];
	echo $out;


} else echo ("Слоны идут нахер!");
?>