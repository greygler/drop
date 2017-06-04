<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
autoring::update_phone($_SESSION['id'], $_POST['phone']);
$_SESSION['phone']=$_POST['phone'];
if(autoring::is_verify_phone()) echo ('error'); else echo('ok');

?>