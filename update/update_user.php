<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');

require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/drop.class.php');
//print_r($_SESSION);
drop::new_sale($_SESSION['id']);
    $info_profile=$_SESSION['info_profile'];
	$info_balance=$_SESSION['info_balance'];
$user=autoring::update_user_info($_SESSION['id']);
$_SESSION['info_profile']=$info_profile;
$_SESSION['info_balance']=$info_balance;
print_r(json_encode($user));

//echo ("Все ок");

?>