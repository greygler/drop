<? 
function replace($str)
	{
		
			$str = str_replace("%email%", '{$email}', $str);
			$str = str_replace("%site%", '{$site}', $str);
			$str = str_replace("%name%", '{$name}', $str);
			$str = str_replace("%verify_link%", '{$verify_link}', $str);
			return $str;
	}
?>