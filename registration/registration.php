<?
session_start();
require_once ('../config.php');
require_once ("../class/autoring.class.php");
require_once ('../class/db.class.php');

if (autoring::is_base($_POST['email'])) echo ("error"); else {
	autoring::set_base($_POST['email'], $_POST['password1'], $_POST['name']);
	autoring::set_autoring($_POST['email'], $_POST['password1'], '0', '2', $_POST['name']);
	
	echo ("ok");
	}

?>
