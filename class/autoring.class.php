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
		
	public function get_base($email, $password) // Забираем из базы. Если нет - возвращаем FALSE
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users WHERE email='{$email}'");
			$myrow = mysql_fetch_array($result);
			if ($myrow['password']==md5($password)) return $myrow;
			else return false;
		}
		
	public function user_group($group_id)
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT * FROM users_group WHERE id_group={$group_id}");
			$myrow = mysql_fetch_array($result);
			
			return $myrow;
		}
		
	public function groups()
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
			$result = mysql_query("INSERT INTO users (email, password, name, drop_key, registration, users_group, balance) VALUES ('{$email}', '{$password}', '{$name}', '{$drop_key}','{$registration}', '2', '0')");
			return $result;
			}
			else return false;
		}
	
		
	
	public function set_autoring($base, $user_group) // Авторизация
		{
			
			$_SESSION=array_merge ($base, $user_group);
			
			
		}
		
	public function logout() // выход
		{
			$_SESSION = array();
			session_destroy();
		}
	
	
	
	

}
?>