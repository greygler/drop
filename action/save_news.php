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


if ($_FILES['img']['name']!=""){$image = new SimpleImage();
    $image->load($_FILES['img']['tmp_name']);
    $image->resizeToWidth(150);
	$new_file_name=md5(time()).".".SimpleImage::img_ext($_FILES["img"]["type"]);
	$image->save(IMG_NEWS_ABS_PATH.$new_file_name);
	echo $new_file_name;
} else echo IMG_NEWS_NAME;
if ($_POST['id']!="new") $return=systems::update_news($_POST['id'], $timestamp, $new_file_name, $_POST['text']);
else $return=systems::save_news($timestamp, $new_file_name,  $_POST['text']); 
//echo $return;


} else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php");