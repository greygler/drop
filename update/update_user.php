<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//require_once ('/home/greygler/greygler.pro/drop/config.php');
date_default_timezone_set(TIME_ZONE);
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
$last_report=drop::last_report($_SESSION['id'], $user);
if ($last_report!=false) {//print_r($last_report);
	$user['report']=$last_report;

	
}

print_r(json_encode($user));

//echo ("Все ок");

?>