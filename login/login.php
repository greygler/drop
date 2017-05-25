<?
session_start();
require_once ('../config.php');
require_once ("../class/autoring.class.php");
require_once ('../class/db.class.php');
if (!autoring::is_base($_POST['email'])) echo ("no"); else {
	$get_base=autoring::get_base($_POST['email'], $_POST['password'] );
	if ($get_base==false) echo (error);
	    else {
			$user_group=autoring::user_group($get_base['users_group']);
			autoring::set_autoring($get_base,$user_group);
			echo ("ok");
			}
}
	



?>