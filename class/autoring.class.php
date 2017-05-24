<?
session_start();
class Autoring {
	
	
	public function is_autoring() // есть ли авторизация
		{
			if (($_SESSION['login']!="") AND ($_SESSION['password']!="")) return true; else return false;
		}
		
	public function is_base($email) // есть ли в базе
		{
			$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
			$result = mysql_query("SELECT COUNT(1) FROM users WHERE email='{$email}'");
			$myrow = mysql_fetch_array($result);
			if ($myrow[0]>0) return true; else return false;
		}
		
		public function create_key() // Создаемк ключ
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
		
	
	
	
	public function set_autoring($login, $password, $remember, $usergroup, $name) // Авторизация
		{
			
			$_SESSION['login']=$login;
			$_SESSION['password']=$password;
			$_SESSION['auttime']=time();
			$_SESSION['remember']=$remember;
			$_SESSION['user_group']=$usergroup;
			$_SESSION['name']=$name;
		}
		
	public function logout() // выход
		{
			$_SESSION['login']='';
			$_SESSION['password']='';
			$_SESSION['auttime']=time();
			$_SESSION['remember']='';
			$_SESSION['user_group']='';
			$_SESSION['name']='';
		}
	
	
	
	

}
?>