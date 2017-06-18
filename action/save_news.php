<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/systems.class.php');
require_once (CLASS_PATH.'/simpleimage.class.php');
//echo drop::del_news($_POST['id_news']);
//print_r($_FILES);

$timestamp=strtotime($_POST['date']." ".$_POST['time_h'].":".$_POST['time_m']);

//echo "<br>".$timestamp;
//echo "<br>".date("d.m.Y H:i:s" , $timestamp);


if ($FILES['img']['name']!=""){
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
     move_uploaded_file($_FILES["img"]["tmp_name"], IMG_NEWS_PATH.$new_file_name);
    
	new_image($_POST['id'], $new_file_name);
	 echo($new_file_name);
   } else {
      echo("error");
   }
} 
if ($_POST['id']!="new") $return=systems::update_news($_POST['id'], $timestamp, $new_file_name, $_POST['text']);
else $return=systems::save_news($timestamp, $new_file_name,  $_POST['text']);
//echo $return;
echo IMG_NEWS_NAME;

} else echo ("Слоны идут нахер!");