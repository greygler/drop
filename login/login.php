<?
session_start();
$_SESSION['login']=$_POST['email'];
$_SESSION['password']=md5($_POST['password']);
$_SESSION['auttime']=time();
$_SESSION['remember']=true;
$_SESSION['user_group']='';
$_SESSION['name']='Игорь Саютин';


header("Location: /");
?>