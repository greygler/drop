<?
session_start();
require_once ('../config.php');
require_once ("../class/autoring.class.php");
require_once ('../class/db.class.php');
if (!autoring::is_base($_POST['email'])) echo ("no"); else {
	$get_base=autoring::get_base($_POST['email'], $_POST['password'] );
	if ($get_base==false) echo (error);
	    else {
			autoring::set_autoring($get_base['email'], $get_base['password'], '0', $get_base['user_group'], $get_base['name']);
			echo ("ok");
			}
}
	



?>