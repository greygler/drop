<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
autoring::save_group($_POST['id'], $_POST['group_user']);
$groups=autoring::groups();
$user=autoring::get_user($_POST['id']);
echo('<span class="badge"> <span class="fa '.$groups[$user['users_group']]['fa_user'].' fa-lg"></span> </span> '.$user['name']);
} else echo ("Слоны идут нахер!");
?>