<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/drop.class.php');
require_once (CLASS_PATH.'/simpleimage.class.php');
//print_r($_FILES);
//print_r($_POST);
?>
<?php
   if($_FILES["img"]["size"] > 1024*3*1024)
   {
     echo ("error");
     exit;
   }
  $new_file_name=md5(time()).".".SimpleImage::img_ext($_FILES["img"]["type"]);
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["img"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["img"]["tmp_name"], IMG_PROD_PATH.$new_file_name);
   $return=drop::new_image($_POST['id'], $new_file_name);
	 echo($new_file_name);
   } else {
      echo("error");
   }
   } else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php");
?>