<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/drop.class.php'); 
$result=drop::product_active($_POST['id'], $_POST['active']);
echo $result;
//print_r($_POST);
?>