<?
session_start();
class Autoring {
	
	public function registration($name, $email, $password)
		{
		
		}
	
	public function is_autoring()
		{
			if (($_SESSION['login']!="") AND ($_SESSION['password']!="")) return true; else return false;
		}
	
	public function autoring($login, $password, $remember, $usergroup, $name)
		{
			$_SESSION['login']=$login;
			$_SESSION['password']=$password;
			$_SESSION['auttime']=time();
			$_SESSION['remember']=$remember;
			$_SESSION['user_group']=$usergroup;
			$_SESSION['name']=$name;
		}
		
	public function logout()
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