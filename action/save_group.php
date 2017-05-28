<?
require_once ('../config.php');
require_once ("../class/db.class.php");
require_once ("../class/autoring.class.php");
autoring::save_group($_POST['id'], $_POST['group_user']);
$groups=autoring::groups();
$user=autoring::get_user($_POST['id']);
echo('<span class="drop_color fa '.$groups[$user['users_group']]['fa_user'].' fa-lg"></span> '.$user['name']);
?>