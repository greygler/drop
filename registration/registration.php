<?
session_start();
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once ("../class/autoring.class.php");
require_once ('../class/db.class.php');

if (autoring::is_base($_POST['email'])) echo ("error"); else {
	autoring::set_base($_POST['email'], $_POST['password1'], $_POST['name']);
	$get_base=autoring::get_base($_POST['email'], $_POST['password1'] );
	$user_group=autoring::user_group($get_base['users_group']);
	autoring::set_autoring($get_base, $user_group);

	
	echo ("ok");
	}
} else echo ("Слоны идут нахер!");
?>
