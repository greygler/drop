<?
session_start();
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once ("../class/autoring.class.php");
require_once ('../class/db.class.php');

	autoring::update_profile($_SESSION['id'], $_POST);
	autoring::update_user_info($_SESSION['id']);
	echo('ok');


} else echo ("Слоны идут нахер!");
?>