<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once ($_SERVER['DOCUMENT_ROOT']."/class/autoring.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');

	autoring::update_profile($_SESSION['id'], $_POST);
	autoring::update_user_info($_SESSION['id']);
	echo('ok');


} else echo ("Слоны идут нахер!");
?>