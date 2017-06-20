<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/functions.class.php');
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
if (!autoring::is_base($_POST['email'])) echo ("no"); else {
	$get_base=autoring::get_base($_POST['email'], $_POST['password'] );
	if ($get_base==false) echo ("error");
	    else {
			$user_group=autoring::user_group($get_base['users_group']);
			$ip=func::GetRealIp();
			if ((!isset($_COOKIE["ip"])) OR ($_COOKIE["ip"]!=$ip))
				{
					$city_array=func::city_2ip($ip);
					$country=$city_array['country_code'];
					$city=$city_array['city_rus'];
					$region=$city_array['region_rus'];
					$provider=func::provider_2ip($ip);
					$provider_name=$provider['name_rus'];
					func::set_cook_array($city_array, '2592000');
					func::set_cook_array($provider, '2592000');
				}
			else {
				$country=$_COOKIE['country_code'];
				$city=$_COOKIE['city_rus'];
				$region=$_COOKIE['region_rus'];
				$provider_name=$_COOKIE['name_rus'];
			}
			$agent=$_SERVER['HTTP_USER_AGENT'];
			$device=func::is_mobile();
			if (!$device) $device='0';
			$last_enter=array(
				ipv4 => $get_base['ipv4'],
				last_time => $get_base['last_time'],
				country => $get_base['country'],
				city => $get_base['city'],
				region => $get_base['region'],
				provider => $get_base['provider'],
				agent => $get_base['agent'],
				device => $get_base['device'],
			);
			autoring::user_log($get_base['id'], $ip, $country, $city, $region, $provider_name, $agent, $device, serialize($last_enter));
			autoring::set_autoring($get_base, $user_group);
			echo ("ok");
			}
}
	
} else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php");


?>