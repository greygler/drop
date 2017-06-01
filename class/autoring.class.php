<?
session_start();
class Autoring {
	
	
	public function is_autoring() // есть ли авторизация
		{
			if (($_SESSION['email']!="") AND ($_SESSION['password']!="")) return true; else return false;
		}
		
	public function is_base($email) // есть ли в базе
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$count=db::cound_bd('users', "email='{$email}'");
			if ($count>0) return true; else return false;
		}
		
	public function get_base($email, $password) // Забираем из базы по паролю и почте. Если нет - возвращаем FALSE
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users WHERE email='{$email}'");
			$myrow = mysql_fetch_array($result);
			if ($myrow['password']==md5($password)) return $myrow;
			else return false;
		}
		
	public function get_user($id) // Забираем из базы по ID.
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users WHERE id='{$id}'");
			$myrow = mysql_fetch_array($result);
			return $myrow;
			
		}
		
		
	public function user_group($group_id) // Узнаем текущий ID группы пользователя
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users_group WHERE id_group={$group_id}");
			$myrow = mysql_fetch_array($result);
			
			return $myrow;
		}
		
	public function save_group($id, $group_id) // Изменяем номер группы пользователя
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("UPDATE users SET users_group={$group_id}  WHERE id={$id}" );
						
			//return $myrow;
		}
		
	public function groups() // Возвращаем информацию о группах пользователй
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
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
		
		
	public function set_base($email, $password, $name) // Добавляем в базу
		{
			if (($email!="") AND ($password!="") AND ($name!="")){
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
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
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users WHERE id='{$id}'");
			$myrow = mysql_fetch_array($result);
			$user_group=autoring::user_group($myrow['users_group']);
			autoring::set_autoring($myrow, $user_group);
		}
	
	public function update_password($id, $password) // Замена пароля
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$password_md5=md5($password);
			$result = mysql_query("UPDATE users SET password='{$password_md5}'  WHERE id={$id}" );
						
			
		}
		
	public function update_profile($id, $profile) // Обновление профиля пользователя
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			foreach($profile as $key => $value) $command.="{$key}='{$value}',";
			$command = substr($command, 0, -1);
			$bd="UPDATE users SET {$command}  WHERE id={$id}";
			$result = mysql_query($bd);
						
			
		}
		
	public function user_log($id, $ip, $country, $city,  $region, $agent, $device, $last_enter) // Сохраяем логи
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$time=time();
			$result = mysql_query("UPDATE users SET ipv4='{$ip}', last_time='{$time}', country='{$country}', city='{$city}', region='{$region}', agent='{$agent}', device='{$device}', last_enter='{$last_enter}'  WHERE id='{$id}'");
			$result = mysql_query("INSERT INTO enter_log (user_id, last_time, ipv4, country, city, region, agent, device) VALUES ('{$id}', '{$time}', '{$ip}', '{$country}', '{$city}', '{$region}', '{$agent}', '{$device}')");
						
		}
	
	public function filling_profile($profile) // Заполнен ли профиль
		{
			if (($profile['phone']!="") OR ($profile['skype']!=""))  return true; else return false;
			
		}
		
	public function is_verify_profile($profile) // Верифицирован ли профиль
		{
			if (($profile['v_phone']!="1") OR ($profile['v_email']!="1"))  return true; else return false;
		}
		
	public function logout() // выход
		{
			$_SESSION = array();
			session_destroy();
		}
	
	
	
	

}
?>