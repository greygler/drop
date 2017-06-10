<?
session_start();
class Autoring {
	
	
	public function is_autoring() // есть ли авторизация
		{
			if (($_SESSION['email']!="") AND ($_SESSION['password']!="")){
//echo ("<script>alert('Авторизация OK')</script>");
			return true; } else return false;
		}
		
	public function is_base($email) // есть ли в базе
		{
		//	$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$count=db::cound_bd('users', "email='{$email}'");
			if ($count>0) return true; else return false;
		}
		
	public function get_base($email, $password) // Забираем из базы по паролю и почте. Если нет - возвращаем FALSE
		{
		//	$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users WHERE email='{$email}'");
			$myrow = mysql_fetch_array($result);
			if ($myrow['password']==md5($password)) return $myrow;
			else return false;
		}
		
	public function get_user($id) // Забираем из базы по ID.
		{
		//	$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users WHERE id='{$id}'");
			$myrow = mysql_fetch_array($result);
			return $myrow;
			
		}
		
		
	public function user_group($group_id) // Узнаем текущий ID группы пользователя
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users_group WHERE id_group='{$group_id}'");
			$myrow = mysql_fetch_array($result);
			
			return $myrow;
		}
		
	public function save_group($id, $group_id) // Изменяем номер группы пользователя
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("UPDATE users SET users_group='{$group_id}'  WHERE id='{$id}'" );
						
			//return $myrow;
		}
		
	public function groups() // Возвращаем информацию о группах пользователй
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users_group");
			$myrow = mysql_fetch_array($result);
			do
			{
				$groups[$myrow['id_group']]['name_group']=$myrow['name_group'];
				$groups[$myrow['id_group']]['fa_logo']=$myrow['fa_logo'];
				$groups[$myrow['id_group']]['fa_user']=$myrow['fa_user'];
			}
			while ($myrow = mysql_fetch_array($result));
						
			return $groups;
		}
		
		
		
		public function create_key() // Создаем ключ
		{
			return md5(time());
		}
		
	public function update_key($id) // Создаем новый ключ и записываем его в базу
		{
			$drop_key=autoring::create_key();
			$result = mysql_query("UPDATE users SET drop_key='{$drop_key}'  WHERE id='{$id}'");
			//return "UPDATE users SET drop_key='{$drop_key}' WHERE id='{$id}'";
			if ($result) return $drop_key; else return "Error!";
			//return $drop_key; 
		}
		
	public function set_base($email, $password, $name) // Добавляем в базу
		{
			if (($email!="") AND ($password!="") AND ($name!="")){
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$password=md5($password);
			$registration=time();
			$drop_key=autoring::create_key();
			$start_user=START_USER;
			$result = mysql_query("INSERT INTO users (email, password, name, drop_key, registration, users_group, balance) VALUES ('{$email}', '{$password}', '{$name}', '{$drop_key}','{$registration}', '{$start_user}', '0')");
			return $result;
			}
			else return false;
		}
	
		
	
	public function set_autoring($base, $user_group) // Авторизация
		{
			
			$_SESSION=array_merge ($base, $user_group);
			
			
		}
	public function update_user_info($id) // Обновляем информацию о пользователе в сесии
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users WHERE id='{$id}'");
			$myrow = mysql_fetch_array($result);
			$user_group=autoring::user_group($myrow['users_group']);
			autoring::set_autoring($myrow, $user_group);
		}
	
	public function update_password($id, $password) // Замена пароля
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$password_md5=md5($password);
			$result = mysql_query("UPDATE users SET password='{$password_md5}'  WHERE id={$id}" );
						
			
		}
		
	public function del_sms_code($id)
		{
			$result = mysql_query("UPDATE `".DB_NAME."`.`users` SET sms=''  WHERE `users`.`id`={$id}");
			$result = mysql_query("UPDATE `".DB_NAME."`.`users` SET v_phone='' WHERE `users`.`id`={$id}");
			$_SESSION['v_phone']='';
			$_SESSION['sms']='';
		}	
		
	public function update_phone($id, $phone) // Замена телефонного номера
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			autoring::del_sms_code($id);
			$result = mysql_query("UPDATE `".DB_NAME."`.`users` SET `phone`='{$phone}' WHERE `users`.`id`={$id}");
			//echo("UPDATE `".DB_NAME."`.`users` SET `phone`='{$phone}' WHERE `users`.`id`={$id}"."<br>");
			$_SESSION['phone']=$_POST['phone'];			
			
		}
		
		
	public function active_drop($id, $active) // Автоматическая передача данных - да\нет
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			
			$result = mysql_query("UPDATE users SET active_drop='{$active}' WHERE id={$id}" );
						
			return $result;
		}
		
	public function update_profile($id, $profile) // Обновление профиля пользователя
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			foreach($profile as $key => $value) $command.="{$key}='{$value}',";
			$command = substr($command, 0, -1);
			$bd="UPDATE users SET {$command}  WHERE id={$id}";
			echo $bd;
			$result = mysql_query($bd);
						
			
		}
		
	public function user_log($id, $ip, $country, $city,  $region, $agent, $device, $last_enter) // Сохраяем логи
		{
			//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$time=time();
			$result = mysql_query("UPDATE users SET ipv4='{$ip}', last_time='{$time}', country='{$country}', city='{$city}', region='{$region}', agent='{$agent}', device='{$device}', last_enter='{$last_enter}'  WHERE id='{$id}'");
			$result = mysql_query("INSERT INTO enter_log (user_id, last_time, ipv4, country, city, region, agent, device) VALUES ('{$id}', '{$time}', '{$ip}', '{$country}', '{$city}', '{$region}', '{$agent}', '{$device}')");
						
		}
	
	public function sms_code($id)
		{
			$smscode=rand(111, 999)."-".date("s")."-".str_pad($id, 3, rand(11, 99), STR_PAD_LEFT);
			
		if ($_SESSION['sms']!="") $sms=$_SESSION['sms']; else {$sms=$smscode;
			$result = mysql_query("UPDATE users SET sms='{$sms}'  WHERE id='{$id}'");
			}
			$_SESSION['sms']=$sms;
			return $sms;
		}
		
	
	
	
	public function verify_sms($id, $v_phone)
		{
			$bd="UPDATE `".DB_NAME."`.`users` SET v_phone='{$v_phone}' WHERE `users`.`id`={$id}";
			$result = mysql_query($bd);
			//if ($result) echo("Save! UPDATE users SET v_phone='{$v_phone}' WHERE id='{$id}'");
			$_SESSION['v_phone']=$v_phone;
			if ($result == 'true') return "ok"; else "error";
		}
	
	public function filling_profile() // Заполнен ли профиль
		{
			if (($_SESSION['phone']!="") AND ($_SESSION['skype']!=""))  {
				//echo ("<script>alert('Профиль заполнен')</script>");
			return true; }else return false;
			
		}
		
	public function is_verify_phone() // Верифицирован ли телефон
		{
			//echo ("<script>alert('Тел {$_SESSION['phone']}')</script>");
			if (($_SESSION['phone']!=$_SESSION['v_phone']) OR ($_SESSION['phone']=="") ) 
			{//echo ("<script>alert('Телефоны {$_SESSION['phone']} и {$_SESSION['v_phone']} не равны')</script>");
		return true;} else 
		{//echo ("<script>alert('Телефоны равны')</script>"); 
	return false;}
		}
		
	public function is_verify_email() // Верифицирован ли E-mail
		{
			//echo ("<script>alert('Email {$_SESSION['email']}')</script>");
			if ($_SESSION['email']!=$_SESSION['v_email']) {
				//echo ("<script>alert('Email {$_SESSION['email']} и {$_SESSION['v_email']} не равны')</script>");
				return true;} else {//echo ("<script>alert('Email равны')</script>"); 
			return false;}
		}
		
	public function is_verify_profile() // Верифицирован ли профиль
		{ //echo ("<script>alert('".print_r($_SESSION)."')</script>");
		$is_verify_email=autoring::is_verify_email();
		$is_verify_phone=autoring::is_verify_phone();
			if ($is_verify_email AND $is_verify_phone )  return true;  else return false;
		}
		
	public function pay_method($where="")
	{
		$result = mysql_query("SELECT * FROM pay_method {$where}");
		$myrow = mysql_fetch_array($result);
		do
		{
		$pay_method[$myrow['id']]=$myrow['name'];
		}
		while ($myrow = mysql_fetch_array($result));
		return $pay_method;
	}
		
	public function logout() // выход
		{
			$_SESSION = array();
			session_destroy();
		}
	
	
	
	

}
?>