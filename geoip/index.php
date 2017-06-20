<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/functions.class.php');
$ip=func::GetRealIp();
if ((!isset($_COOKIE["ip"])) OR ($_COOKIE["ip"]!=$ip))
{
	$city=func::city_2ip($ip);
	$provider=func::provider_2ip($ip);
	func::set_cook_array($city, '2592000');
	func::set_cook_array($provider, '2592000');
	print_r($city);
	echo("<br>=========<br>");
	print_r($provider);
	echo("<br>=========<br>");
	print_r($_COOKIE);
}
else {echo ("Такой IP уже есть!<br>");print_r($_COOKIE);}
 } else header("Location: ".SITE_ADDR."/error/666.php"); 
 ?>
