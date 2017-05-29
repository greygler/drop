<?
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once ("../class/db.class.php");
require_once ("../class/autoring.class.php");
autoring::save_group($_POST['id'], $_POST['group_user']);
$groups=autoring::groups();
$user=autoring::get_user($_POST['id']);
echo('<span class="badge"> <span class="fa '.$groups[$user['users_group']]['fa_user'].' fa-lg"></span> </span> '.$user['name']);
}
else echo ("Слоны идут нахер!");
?>