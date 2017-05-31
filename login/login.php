<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/functions.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');
if (!autoring::is_base($_POST['email'])) echo ("no"); else {
	$get_base=autoring::get_base($_POST['email'], $_POST['password'] );
	if ($get_base==false) echo ("error");
	    else {
			$user_group=autoring::user_group($get_base['users_group']);
			$ip=func::GetRealIp();
			$agent=$_SERVER['HTTP_USER_AGENT'];
			$device=func::is_mobile();
			if (!$device) $device='0';
			$last_enter=array(
				ipv4 => $get_base['ipv4'],
				last_time => $get_base['last_time'],
				country => $get_base['country'],
				city => $get_base['city'],
				region => $get_base['region'],
				agent => $get_base['agent'],
				device => $get_base['device'],
			);
			autoring::user_log($get_base['id'], $ip, $_POST['country'], $_POST['city'], $_POST['region'], $agent, $device, serialize($last_enter));
			autoring::set_autoring($get_base, $user_group);
			echo ("ok");
			}
}
	
} else echo ("Слоны идут нахер!");


?>