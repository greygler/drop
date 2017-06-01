<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php'); 
define('DB_HOST_TURBOSMS',"94.249.146.189");
define('DB_NAME_TURBOSMS',"users");

class Turbosms
{
	public function sms($phone, $sms)
	{

		$result=db::connect_db(DB_HOST_TURBOSMS, DB_NAME_TURBOSMS, DB_LOGIN_TURBOSMS, DB_PASS_TURBOSMS);
		$phone = preg_replace('![^0-9]+!', '', $phone);
		$result = mysql_query ("INSERT INTO ".DB_LOGIN_TURBOSMS." (number, sign, message) VALUES ('{$phone}', '".NAME_TURBOSMS."', '{$sms}')");

		if ($result == 'true')
		{
			return "SMS на номер {$phone} отправлена!";
		}
		else
		{
			return "SMS на номер {$phone} НЕ ОТПРАВЛЕНА!";
		}
}
}
?>